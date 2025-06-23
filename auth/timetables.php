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
        Timetable
    </h3>
    <hr>
    <div class="responsive">
        <div
            class="table-responsive">
            <table
                class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <caption>
                        Time Tables
                    </caption>
                    <tr>
                        <th>class</th>
                        <th>monday</th>
                        <th>tuesday</th>
                        <th>wednesday</th>
                        <th>thursday</th>
                        <th>friday</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-primary">
                        <td>
                            <?php echo $monday['class'] ?>

                        </td>
                        <td>
                            <p>Subject: <?php echo $monday['subject'] ?></p>
                            <p>Time: <?php echo $monday['time'] ?></p>
                            <p>Teacher: <?php echo $monday['teacher'] ?></p>
                        </td>
                        <td>
                            <p>Subject: <?php echo $tuesday['subject'] ?></p>
                            <p>Time: <?php echo $tuesday['time'] ?></p>
                            <p>Teacher: <?php echo $tuesday['teacher'] ?></p>
                        </td>
                        <td>
                            <p>Subject: <?php echo $wednesday['subject'] ?></p>
                            <p>Time: <?php echo $wednesday['time'] ?></p>
                            <p>Teacher: <?php echo $wednesday['teacher'] ?></p>
                        </td>
                        <td>
                            <p>Subject: <?php echo $thursday['subject'] ?></p>
                            <p>Time: <?php echo $thursday['time'] ?></p>
                            <p>Teacher: <?php echo $thursday['teacher'] ?></p>
                        </td>
                        <td>
                            <p>Subject: <?php echo $friday['subject'] ?></p>
                            <p>Time: <?php echo $friday['time'] ?></p>
                            <p>Teacher: <?php echo $friday['teacher'] ?></p>
                        </td>
                    </tr>
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