<div class="col-sm-2 bg-dark text-white nav-app p-0">
    <div class="logoDiv">
        <img src="../image.png" alt="Logo" class="img-fluid logo mx-auto d-block mb-2 mt-2">
    </div>
    <ul class="nav-bar sideBar mt-2">
        <li class="nav-item">
            <a class="nav-link" title="dashboard" href="#"><i class="fa fa-dashboard" aria-hidden="true"></i> <span class="menu-name">Dashboard</span></a>
        </li>
        <?php if ($role === "student") { ?>
        <li class="nav-item">
            <a class="nav-link" title="progress" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="menu-name">Progress</span></a>
        </li>
        <?php } ?>
        <?php if ($role === "teacher") { ?>
            <li class="nav-item dropend bg-dark">
                <a class="nav-link bg-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-graduate"></i> Students
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Add Progress</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye    "></i> View Stdents</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-edit    "></i> Edit student</a></li>
                </ul>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" title="time-table" href="#"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span class="menu-name">Time-table</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" title="me" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span class="menu-name">Me</span></a>
        </li>
        <?php if ($role === "admin") { ?>
            <li class="nav-item">
                <a class="nav-link" title="settings" href="#"><i class="fa fa-tools" aria-hidden="true"></i> <span class="menu-name">Settings</span></a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" title="exit" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="menu-name">Exit</span></a>
        </li>
    </ul>
</div>