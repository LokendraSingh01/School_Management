<?php
ob_start();
session_start();
include "include/header.php";
include 'school.php';
$school = new School();
$school->checkLogin();
?>


<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Techer</h6>
                <form method="post" action="action.php">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputPassword3" name="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Mobno</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="mob" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="address" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="subject" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="salary" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">joining Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputPassword3" name="joining_date" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <select class="form-select form-control" id="floatingSelect" name="gender" aria-label="Floating label select example" required>
                            <option selected>Open this select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="row mb-3">

                        <div class="d-flex align-items-center gap-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Class</label>
                            <div class="form-check form-check-success">
                                <input class="form-check-input" type="checkbox" name="class[]" value="1" id="flexCheckSuccess">
                                <label class="form-check-label" for="flexCheckSuccess">
                                    1
                                </label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input class="form-check-input" type="checkbox" name="class[]" value="2" id="flexCheckDanger">
                                <label class="form-check-label" for="flexCheckDanger">
                                    2
                                </label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input class="form-check-input" type="checkbox" name="class[]" value="3" id="flexCheckWarning">
                                <label class="form-check-label" for="flexCheckWarning">
                                    3&nbsp;&nbsp;
                                </label>
                            </div>
                            <div class="form-check form-check-dark">
                                <input class="form-check-input" type="checkbox" name="class[]" value="4" id="flexCheckDark">
                                <label class="form-check-label" for="flexCheckDark">
                                    4&nbsp;&nbsp;
                                </label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input class="form-check-input" type="checkbox" name="class[]" value="5" value id="flexCheckSecondary">
                                <label class="form-check-label" for="flexCheckSecondary">
                                    5
                                </label>
                            </div>
                            <div class="form-check form-check-info">
                                <input class="form-check-input" type="checkbox" name="class[]" value="6" id="flexCheckInfo">
                                <label class="form-check-label" for="flexCheckInfo">
                                    6
                                </label>
                            </div>
                            <div class="form-check form-check-info">
                                <input class="form-check-input" type="checkbox" name="class[]" value="7" id="flexCheckInfo">
                                <label class="form-check-label" for="flexCheckInfo">
                                    7
                                </label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <div class="form-check form-check-success">
                                <input class="form-check-input" type="checkbox" name="class[]" value="8" id="flexCheckSuccess">
                                <label class="form-check-label" for="flexCheckSuccess">
                                    8
                                </label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input class="form-check-input" type="checkbox" name="class[]" value="9" id="flexCheckDanger">
                                <label class="form-check-label" for="flexCheckDanger">
                                    9
                                </label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input class="form-check-input" type="checkbox" name="class[]" value="10" id="flexCheckWarning">
                                <label class="form-check-label" for="flexCheckWarning">
                                    10
                                </label>
                            </div>
                            <div class="form-check form-check-dark">
                                <input class="form-check-input" type="checkbox" name="class[]" value="11" id="flexCheckDark">
                                <label class="form-check-label" for="flexCheckDark">
                                    11
                                </label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input class="form-check-input" type="checkbox" name="class[]" value="12" id="flexCheckSecondary">
                                <label class="form-check-label" for="flexCheckSecondary">
                                    12
                                </label>
                            </div>
                         
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="techer_add">Save</button>
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