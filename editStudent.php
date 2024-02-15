<?php
ob_start();
session_start();
include "include/header.php";
include 'school.php';
$school = new School();
$school->checkLogin();

$row = $school->editstudent();
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Student</h6>
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
                            <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo $row['name'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo $row['email'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="password" value="<?php echo $row['password'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">MobNO</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="mob" value="<?php echo $row['mob'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo $row['address'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo $row['class'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <select class="form-select form-control" id="floatingSelect" name="gender" aria-label="Floating label select example" required>
                            <option value="Male" <?php if ($row['gender'] == "Male") {
                                                        echo "selected";
                                                    } ?>>Male</option>
                            <option value="Female" <?php if ($row['gender'] == "Female") {
                                                        echo "selected";
                                                    } ?>>Female</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="student_edit">Save</button>
                    <a name="" id="" class="btn btn-primary" href="showstudent.php" role="button">Return</a>

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