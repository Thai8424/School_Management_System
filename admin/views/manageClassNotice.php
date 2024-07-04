<?php
include "../inc/head.php";
include "../func/ClassNoticeHandler.php";

$classNotices = getClassNotices();
if(isset($_POST['delete'])){
    deleteClassNotice($_POST['delete']);
}
if(isset($_POST['edit'])){
    editClassNotice($_POST);
}
?>

<div class="container my-5 ml-2 flex-shrink-1 p-3">
    <div class="row p-3">
        <div class="col-md-12">
            <div class="align-items-baseline d-flex justify-content-between">
                <h5>Manage Class Notice</h5>
                <div class="d-flex align-items-baseline">
                    <a class="text-decoration-none" href="index.php">Dashboard</a>
                    <p class="ml-1 text-muted">/ Manage Class Notice</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 rounded">
        <div class="d-flex justify-content-between">
            <h5 class="text-center">Manage Class Notice</h5>
            <a class="text-decoration-none" href="#">View All Notices</a>
        </div>
        <table class="table table-primary table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Notice Title</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>
                    <th scope="col">Notice Date</th>
                    <th scope="col">Notice ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach($classNotices as $notice) { ?>
                <tr>
                    <th><?php echo $i?></th>
                    <td style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo $notice['notice_title']?></td>
                    <td><?php echo $notice['class_name']?></td>
                    <td><?php echo $notice['section']?></td>
                    <td><?php echo $notice['date']?></td>
                    <td><?php echo $notice['notice_id']?></td>
                    <td><a class="text-decoration-none text-warning" data-bs-toggle="modal"
                            data-bs-target="#editModal<?=$i?>"><i class="fa-solid fa-pen"></i></a> ||
                        <a class="text-decoration-none text-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?=$i?>"><i class="fa-solid fa-eraser"></i></a> ||
                        <a class="text-decoration-none text-info" data-bs-toggle="modal"
                            data-bs-target="#viewModal<?=$i?>"><i class="fa-solid fa-file-invoice"></i></a>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?=$i?>" tabindex="-1" aria-labelledby="editModalLabel<?=$i?>"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 style="max-width:350px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" class="modal-title fs-5" id="editModalLabel<?=$i?>">Change
                                    "<?=$notice['notice_title']?>"
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="manageClassNotice.php" method="post">
                                    <div class="form-group">
                                        <label for="noticeTitle">Notice title</label>
                                        <input type="text" name="noticeTitle"
                                            class="form-control border border-primary font-weight-bold bg-white"
                                            value="<?=$notice['notice_title']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="noticeMessage">Notice body</label>
                                        <input type="text" name="noticeMessage"
                                            class="form-control border border-primary font-weight-bold bg-white"
                                            value="<?=$notice['notice_body']?>">
                                    </div>
                                    <div class="d-flex gap-lg-3">
                                        <div class="classname">
                                            <div class="form-group">
                                                <label for="class_name">Class name</label>
                                                <select name="class_name" class="form-control border border-primary font-weight-bold bg-white"
                                                    required='true'>
                                                    <option value="">Choose Grade</option>
                                                    <?php foreach (range(1, 12) as $number):?>
                                                        <?php if($number == $notice['class_name']):?>
                                                            <option value="<?= $number?>" selected><?= $number?></option>
                                                        <?php else:?>
                                                            <option value="<?= $number?>"><?= $number?></option>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="form-group">
                                                <label for="section">Section</label>
                                                <select name="section" class="form-control border border-primary font-weight-bold bg-white"
                                                    required='true'>
                                                    <option value="">Choose Section</option>
                                                    <?php foreach(range('a','f') as $letter):?>
                                                    <?php if(strtoupper($letter) == $notice['section']):?>
                                                    <option value="<?= strtoupper($letter)?>" selected><?= strtoupper($letter)?></option>
                                                    <?php else:?>
                                                    <option value="<?= strtoupper($letter)?>"><?= strtoupper($letter)?></option>
                                                    <?php endif;?>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="hidden" name="notice_id" value="<?=$notice['notice_id']?>">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?=$i?>" tabindex="-1" aria-labelledby="deleteModalLabel<?=$i?>"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel<?=$i?>">Delete</h1>
                                <h1 class="modal-title fs-5" style="max-width:350px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"> "<?=$notice['notice_title']?>"</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Do you want to delete this class notice?</h5>
                            </div>
                            <div class="modal-footer">
                                <form action="manageClassNotice.php" method="post">
                                    <input type="hidden" name="delete" value="<?=$notice['notice_id']?>">
                                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View Modal -->
                <div class="modal fade" id="viewModal<?=$i?>" tabindex="-1" aria-labelledby="viewModalLabel<?=$i?>"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 style="max-width:350px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" class="modal-title fs-5" id="viewModalLabel<?=$i?>"><?=$notice['notice_title']?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-group">
                                        <h5 class="overflow-scroll"><?=$notice['notice_body']?></h5>
                                        <hr>
                                        <div class="form-group mt-2">
                                            <div class="d-flex gap-3">
                                                <div class="creator">
                                                    <label for="creator<?=$i?>">Note creator</label>
                                                    <input type="text" name="creator<?=$i?>"
                                                        class="form-control border border-primary font-weight-bold bg-white"
                                                        value="<?=$notice['Fname'] . " " . $notice['Lname']?>" readonly required>
                                                </div>
                                                <div class="date">
                                                    <label for="CreatedDay<?=$i?>">Notice day</label>
                                                    <input type="date" name="CreatedDay<?=$i?>"
                                                        class="form-control border border-primary font-weight-bold bg-white"
                                                        value="<?=substr($notice['date'],0,10)?>" readonly required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i += 1;} ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "../inc/footer.php";
?>