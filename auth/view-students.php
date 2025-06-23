<?php
require "header.php";
?>
<?php
require "navbar.php";
?>
<div class="col-sm-10 pl-2 pr-2 main-content">
    <div class="container-fluid">
        <div class="row dataDiv">
            <div class="col-sm-12 ml-0 bg-dark dataDivTop text-white">
                <h1 class="text-center mt-2">Welcome <?php if ($fname && $role) {
                                                            echo $role . " " . $fname;
                                                        } ?>!</h1>
            </div>
        </div>
    </div>
    <h3 class="text-start mt-2">
        Students
    </h3>
    <hr>
    <div class="responsive">
        <div
            class="table-responsive">
            <table
                class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <caption>
                     Students Table
                    </caption>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach($view_student_result as $student):?>
                    <tr
                    class="table-primary">
                        <td><?php echo $student['fname'] ?></td>
                        <td><?php echo $student['lname'] ?></td>
                        <td><?php echo $student['email'] ?></td>
                        <td><?php echo $student['class'] ?></td>
                        <td>
                            <a href="button" class="btn btn-danger"><i class="fas fa-edit"></i> edit progress</a>
                            <a href="button" class="btn btn-secondary"><i class="fas fa-eye"></i> view details</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
</div>
<!--  -->
<?php
require "footer.php";
?>