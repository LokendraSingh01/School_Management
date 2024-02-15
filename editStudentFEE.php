<?php
ob_start();
session_start();
include "include/header.php";
include 'school.php';
$school = new School();
$school->checkLogin();

$row = $school->editstudentFEE();
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Update Student Fee</h6>
                <form method="post" action="action.php">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Roll_No</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="roll_no" value="<?php echo $row['roll_no'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo $row['name'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo $row['class'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Paid_fee</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="paid_fee" value="<?php echo $row['paid_fee'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Due_fee</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="due_fee" value="<?php echo $row['due_fee'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Total_Fee</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="total_fees" value="<?php echo $row['total_fees'] ?>" readonly>
                        </div>
                    </div>
                    
                   
                   

                    <button type="submit" class="btn btn-primary" name="studentfees_edit">Save</button>
                    <a name="" id="" class="btn btn-primary" href="studentFEE.php" role="button">Return</a>

                </form>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">

            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                </div>
                <div id="calender"></div>
            </div>

        </div>

    </div>
</div>

<?php
include "include/footer.php";
?>