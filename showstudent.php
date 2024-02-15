 <?php
    ob_start();
    session_start();
    include "include/header.php";
    include 'school.php';
    $school = new School();
    $school->checkLogin();

    $result = $school->showStudents();
  
    ?>
 <h2 class='mb-3'>Students</h2>



 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">

         <table id="example" class="table table-striped" style="width:100%">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Roll_no</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Mob</th>
                     <th>Class</th>
                     <th>Address</th>
                     <th>Date</th>
                     <th><i class="	fas fa-pencil-alt me-2"></th>
                     <th><i class="fa fa-trash" aria-hidden="true"></i></th>
                 </tr>
             </thead>
             <tbody>
                 <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                     <tr>
                         <td><?php echo $row['id']; ?></td>
                         <td><?php echo $row['roll_no']; ?></td>
                         <td><?php echo $row['name']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <td><?php echo $row['mob']; ?></td>
                         <td><?php echo $row['class']; ?></td>
                         <td><?php echo $row['address']; ?></td>
                         <td><?php echo $row['date']; ?></td>
                         <td><a href="editStudent.php?roll_no=<?php echo $row['roll_no']; ?>" class="nav-item nav-link" ><i class="fas fa-pencil-alt"></i></a></td>
                         <td><a href="action.php?roll_no=<?php echo $row['roll_no']; ?>" class="nav-item nav-link"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                     </tr>
                 <?php } ?>
             </tbody>
             <tfoot>
                 <tr>
                     <th>#</th>
                     <th>Roll_no</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Mob</th>
                     <th>Class</th>
                     <th>Address</th>
                     <th>Date</th>
                     <th><i class="	fas fa-pencil-alt"></th>
                     <th><i class="fa fa-trash" aria-hidden="true"></i></th>
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