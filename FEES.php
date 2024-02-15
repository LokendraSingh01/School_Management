<?php
ob_start();
session_start();
include "include/header.php";
include 'school.php';
$school = new School();
$school->checkLogin();
$result = $school->showFEE();
?>


<h2 class='mb-3'>Fees</h2>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Fees</th>
                    <th>Date</th>
                    <th><i class="	fas fa-pencil-alt me-2"></th>
                    <th><i class="fa fa-trash" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['fees']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><a href="editFees.php?id=<?php echo $row['id']; ?>" class="nav-item nav-link"><i class="fas fa-pencil-alt"></i></a></td>
                        <td><a href="action.php?Fee_id=<?php echo $row['id']; ?>" class="nav-item nav-link"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Fees</th>
                    <th>Date</th>
                    <th><i class="	fas fa-pencil-alt me-2"></th>
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