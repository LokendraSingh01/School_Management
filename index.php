<?php
ob_start();
session_start();
include "include/header.php";
include 'school.php';
$school = new School();
$school->checkLogin();

$total_Students = $school->totalstudents();
$total_Techers = $school->totaltechers();
$total_Classes = $school->totalClasses();
$paidFee=$school->totalpaidfee();
$result=$school->newStudents();
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Students</p>
                    <h6 class="mb-0"><?php echo $total_Students; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-user-tie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Techers</p>
                    <h6 class="mb-0"><?php echo $total_Techers; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fas fa-school fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Classes</p>
                    <h6 class="mb-0"><?php echo $total_Classes; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="	fas fa-hand-holding-usd fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Recent Paid Fee</p>
                    <h6 class="mb-0"><?php echo $paidFee; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">New Students</h6>
            <a href="showstudent.php">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">

                        <th scope="col">Roll_no</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mob</th>
                        <th scope="col">Class</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                         
                         <td><?php echo $row['roll_no']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <td><?php echo $row['mob']; ?></td>
                         <td><?php echo $row['class']; ?></td>
                         <td><?php echo $row['address']; ?></td>
                         <td><?php echo $row['date']; ?></td>
                         
                     </tr>
                 <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include "include/footer.php";
?>