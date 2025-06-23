document.addEventListener('DOMContentLoaded', function () {
    // code to activate the sidebar links
    let navLinks = document.querySelectorAll(".menu-name");

    document.querySelectorAll('.nav-link').forEach((link, index) => {
        link.addEventListener('click', function () {
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
    // if (links.length > 0) showTooltip(currentStep);
    const TOUR_KEY = 'sidebarTourCompleted';

    // Hide tour if already completed
    if (localStorage.getItem(TOUR_KEY) === 'true') {
        closeTooltip();
    }

    // Listen for manual tour start
    const tourStartBtn = document.getElementById('tourStartBtn');
    if (tourStartBtn) {
        tourStartBtn.addEventListener('click', function () {
            currentStep = 0;
            localStorage.removeItem(TOUR_KEY);
            showTooltip(currentStep);
        });
    }

    // Mark tour as completed when finished or closed
    function markTourCompleted() {
        localStorage.setItem(TOUR_KEY, 'true');
        closeTooltip();
    }

    // Patch showTooltip to mark as completed on finish/close
    const origShowTooltip = showTooltip;
    showTooltip = function(index) {
        origShowTooltip(index);
        const tooltip = document.querySelector('.custom-tooltip');
        if (!tooltip) return;
        const nextBtn = tooltip.querySelector('.tourNext');
        const backBtn = tooltip.querySelector('.tourBack');
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                if (index === links.length - 1) markTourCompleted();
            });
        }
        if (backBtn) {
            backBtn.addEventListener('click', () => {
                if (index === 0) markTourCompleted();
            });
        }
    };
});