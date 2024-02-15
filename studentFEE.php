<?php
    ob_start();
    session_start();
    include "include/header.php";
    include 'school.php';
    $school = new School();
    $school->checkLogin();

    $result = $school->showStudentsFee();
  
    ?>
 <h2 class='mb-3'>StudentsFee</h2>



 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">

         <table id="example" class="table table-striped" style="width:100%">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Roll_no</th>
                     <th>Name</th>
                     <th>Class</th>
                     <th>Paid_Fee</th>
                     <th>Due_Fee</th>
                     <th>Total_Fee</th>
                     <th>Date</th>
                     <th><i class="	fas fa-pencil-alt me-2"></th>
                   
                 </tr>
             </thead>
             <tbody>
                 <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                         <td><?php echo $row['id']; ?></td>
                         <td><?php echo $row['roll_no']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['class']; ?></td>
                         <td><?php echo $row['paid_fee']; ?></td>
                         <td><?php echo $row['due_fee']; ?></td>
                         <td><?php echo $row['total_fees']; ?></td>
                         <td><?php echo $row['date']; ?></td>
                         <td><a href="editStudentFEE.php?roll_no=<?php echo $row['roll_no']; ?>" class="nav-item nav-link" ><i class="fas fa-pencil-alt"></i></a></td>
                        
                     </tr>
                 <?php } ?>
             </tbody>
             <tfoot>
                 <tr>
                     <th>#</th>
                     <th>Roll_no</th>
                     <th>Name</th>
                     <th>Class</th>
                     <th>Paid_Fee</th>
                     <th>Due_Fee</th>
                     <th>Total_Fee</th>
                     <th>Date</th>
                     <th><i class="	fas fa-pencil-alt me-2"></th>
                 </tr>
             </tfoot>
         </table>
        
     </div>
 </div>
 <script>
     new DataTable('#example');
 </script>
 <?php
    include "include/footer.php";
    ?>