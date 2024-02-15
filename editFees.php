<?php
ob_start();
session_start();
include "include/header.php";
include 'school.php';
$school = new School();
$school->checkLogin();

$row = $school->editFees();
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Fees</h6>
                <form method="post" action="action.php">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="id" value="<?php echo $row['id'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="class" value="<?php echo $row['class'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">FEES</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="fees" value="<?php echo $row['fees'] ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="Fees_edit">Save</button>
                    <a name="" id="" class="btn btn-primary" href="FEES.php" role="button">Return</a>

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