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
                <h6 class="mb-4">Add Student</h6>
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
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">MobNO</label>
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
                        <select class="form-select form-control" id="floatingSelect" name="gender" aria-label="Floating label select example" required>
                            <option selected>Open this select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <select class="form-select form-control" id="floatingSelect" name="class" aria-label="Floating label select example" required>
                            <option selected>Open this select Class</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="student_add">Save</button>
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