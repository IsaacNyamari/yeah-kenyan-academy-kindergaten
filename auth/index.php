<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard - Role Based</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="../image.png" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- include fontawesome cdn here -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/v4-shims.min.css" rel="stylesheet">
    <!-- Flaticon Font -->
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- bootstrap cdn -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row nav-app-container" style="height: 100vh;">
            <div class="col-sm-2 bg-dark text-white nav-app p-0">
                <div class="logo">
                    <img src="../image.png" alt="Logo" class="img-fluid logo mx-auto d-block mb-2 mt-2">
                </div>
                <ul class="nav-bar sideBar mt-2">
                    <li class="nav-item">
                        <a class="nav-link" title="dashboard" href="#"><i class="fa fa-dashboard" aria-hidden="true"></i> <span class="menu-name">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="progress" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="menu-name">Progress</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" title="time-table" href="#"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span class="menu-name">Time-table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="me" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span class="menu-name">Me</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="settings" href="#"><i class="fa fa-tools" aria-hidden="true"></i> <span class="menu-name">Settings</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="exit" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="menu-name">Exit</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-10 p-0 pl-1 main-content" style="width: 100% !important">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 bg-dark text-white">
                            <h1 class="text-center mt-2">Welcome to the Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // code to activate the sidebar links
        let navLinks = document.querySelectorAll(".menu-name");

        document.querySelectorAll('.nav-link').forEach((link, index) => {
            link.addEventListener('click', function() {
                navLinks.forEach(item => {
                    item.classList.remove("hidden");
                });

                document.querySelectorAll('.nav-link').forEach(item => {
                    item.classList.remove('active');
                });

                navLinks[index].classList.add("hidden");
                this.classList.add('active');
            });
        });
            // Start the tour
document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('.nav-link');
    let currentStep = 0;

    // Function to create readable tooltip text from title
    function generateTooltipText(title) {
        const formatted = title.replace(/-/g, ' ');
        switch (title.toLowerCase()) {
            case 'dashboard':
                return 'Your dashboard is here! See all your details!';
            case 'settings':
            case 'me':
                return 'You can manage your account settings here!';
            case 'progress':
                return 'See where you are heading in your academics!';
            case 'time-table':
                return 'See your class time-table!';
            case 'exit':
                return 'Log out of your account here!';
            default:
                return `Learn more about "${formatted}" here!`; // fallback for unknown titles
        }
    }

    function closeTooltip() {
        const tooltip = document.querySelector('.custom-tooltip');
        if (tooltip) tooltip.remove();
    }

function showTooltip(index) {
    closeTooltip();
    if (index < 0 || index >= links.length) return;

    const link = links[index];
    let icon = link.querySelector('i');    
    // Convert icon (which is an Element) to its HTML string
    let iconHtml = '';
    if (icon instanceof HTMLElement) {
        iconHtml = icon.outerHTML;
    } else if (icon && typeof icon === 'object') {
        // fallback for SVG or other objects
        iconHtml = icon.toString();
    } else {
        iconHtml = '';
    }
    
    const title = link.title || `Step ${index + 1}`;
    const tooltipText = generateTooltipText(title);

    const isFirst = index === 0;
    const isLast = index === links.length - 1;

    const tooltip = document.createElement('div');
    tooltip.className = 'custom-tooltip';
    tooltip.innerHTML = `
        <div class="d-block p-2"><strong>${iconHtml} ${title.toUpperCase()}</strong><br>${tooltipText}</div>
        <div style="overflow: hidden;">
            <button type="button" class="btn btn-danger tourBack" style="float: left;">
                ${isFirst ? '<i class="fa fa-times"></i> Close' : '<i class="fa fa-backward"></i> Back'}
            </button>
            <button type="button" class="btn btn-success tourNext" style="float: right;">
                ${isLast ? '<i class="fa fa-check"></i> Finish' : '<i class="fa fa-forward"></i> Next'}
            </button>
        </div>`;

    document.body.appendChild(tooltip);

    const rect = link.getBoundingClientRect();
    const tooltipWidth = 250; // Estimated width
    const spaceRight = window.innerWidth - rect.right;
    const spaceLeft = rect.left;
    const spaceBottom = window.innerHeight - rect.bottom;

    // Default: show on the right
    let left = rect.right + 10;
    let top = rect.top;

    // If not enough space on right, show on left
    if (spaceRight < tooltipWidth && spaceLeft > tooltipWidth) {
        left = rect.left - tooltipWidth - 10;
    }

    // If not enough space vertically, shift upward slightly
    if (spaceBottom < 100) {
        top = rect.top - 80;
    }

    // Apply styles
    tooltip.style.position = 'absolute';
    tooltip.style.left = left + 'px';
    tooltip.style.top = top + 'px';
    tooltip.style.background = '#343a40';
    tooltip.style.color = '#fff';
    tooltip.style.padding = '5px 10px';
    tooltip.style.borderRadius = '4px';
    tooltip.style.zIndex = 1000;
    tooltip.style.fontSize = '14px';
    tooltip.style.maxWidth = '90vw';
    tooltip.style.boxShadow = '0 0 10px rgba(0,0,0,0.3)';

    // Buttons
    const nextBtn = tooltip.querySelector('.tourNext');
    const backBtn = tooltip.querySelector('.tourBack');

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (isLast) closeTooltip();
            else showTooltip(++currentStep);
        });
    }

    if (backBtn) {
        backBtn.addEventListener('click', () => {
            if (isFirst) closeTooltip();
            else showTooltip(--currentStep);
        });
    }
}

    // Start tour
    if (links.length > 0) showTooltip(currentStep);
});
    </script>
</body>

</html>