// Header JavaScript - header.js

document.addEventListener("DOMContentLoaded", function () {
    // Initialize header functionality
    initializeHeader();
});

function initializeHeader() {
    // Initialize language switcher
    initLanguageSwitcher();

    // Initialize user dropdown
    initUserDropdown();

    // Initialize logout functionality
    initLogout();

    // Initialize mobile menu
    initMobileMenu();

    // Initialize avatar loading
    initAvatarLoading();

    // Initialize smooth scrolling
    initSmoothScrolling();
}

// Language Switcher Functionality
function initLanguageSwitcher() {
    const languageItems = document.querySelectorAll(
        ".language-dropdown .dropdown-item"
    );

    languageItems.forEach((item) => {
        item.addEventListener("click", function (e) {
            e.preventDefault();

            // Get language info
            const langUrl = this.getAttribute("href");
            const langText = this.textContent.trim();

            // Update current language display
            const currentLangElement = document.getElementById("currentLang");
            if (currentLangElement) {
                currentLangElement.textContent = langText;
            }

            // Update active states
            updateLanguageActiveState(this);

            // Show loading state
            showLanguageLoading();

            // Navigate to language switch route
            window.location.href = langUrl;
        });
    });
}

function updateLanguageActiveState(selectedItem) {
    // Remove active from all items
    document
        .querySelectorAll(".language-dropdown .dropdown-item")
        .forEach((item) => {
            item.classList.remove("active");
            const checkIcon = item.querySelector(".bi-check");
            if (checkIcon) {
                checkIcon.classList.add("invisible");
            }
        });

    // Add active to selected item
    selectedItem.classList.add("active");
    const selectedCheck = selectedItem.querySelector(".bi-check");
    if (selectedCheck) {
        selectedCheck.classList.remove("invisible");
    }
}

function showLanguageLoading() {
    const currentLangElement = document.getElementById("currentLang");
    if (currentLangElement) {
        const originalText = currentLangElement.textContent;
        currentLangElement.innerHTML =
            '<i class="bi bi-arrow-repeat"></i> Loading...';

        // Animate the loading icon
        const loadingIcon =
            currentLangElement.querySelector(".bi-arrow-repeat");
        if (loadingIcon) {
            loadingIcon.style.animation = "spin 1s linear infinite";
        }
    }
}

// User Dropdown Functionality
function initUserDropdown() {
    const userDropdown = document.getElementById("userDropdown");
    if (!userDropdown) return;

    // Add click event for user avatar
    userDropdown.addEventListener("click", function (e) {
        e.preventDefault();
        toggleUserDropdown();
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (e) {
        const dropdown = document
            .querySelector("#userDropdown")
            .closest(".dropdown");
        if (!dropdown.contains(e.target)) {
            closeUserDropdown();
        }
    });
}

function toggleUserDropdown() {
    const dropdownMenu =
        document.querySelector("#userDropdown").nextElementSibling;
    if (dropdownMenu) {
        dropdownMenu.classList.toggle("show");
    }
}

function closeUserDropdown() {
    const dropdownMenu =
        document.querySelector("#userDropdown").nextElementSibling;
    if (dropdownMenu && dropdownMenu.classList.contains("show")) {
        dropdownMenu.classList.remove("show");
    }
}

// Logout Functionality
function initLogout() {
    const logoutBtn = document.getElementById("logoutBtn");
    if (!logoutBtn) return;

    logoutBtn.addEventListener("click", function (e) {
        e.preventDefault();
        handleLogout();
    });
}

function handleLogout() {
    // Show confirmation dialog
    if (confirm("Bạn có chắc chắn muốn đăng xuất?")) {
        // Show loading state
        showLogoutLoading();

        // Submit logout form
        const logoutForm = document.getElementById("logout-form");
        if (logoutForm) {
            logoutForm.submit();
        }
    }
}

function showLogoutLoading() {
    const logoutBtn = document.getElementById("logoutBtn");
    if (logoutBtn) {
        const originalContent = logoutBtn.innerHTML;
        logoutBtn.innerHTML =
            '<i class="bi bi-arrow-repeat"></i> Đang đăng xuất...';
        logoutBtn.style.pointerEvents = "none";

        // Animate loading icon
        const loadingIcon = logoutBtn.querySelector(".bi-arrow-repeat");
        if (loadingIcon) {
            loadingIcon.style.animation = "spin 1s linear infinite";
        }
    }
}

// Mobile Menu Functionality
function initMobileMenu() {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbarCollapse = document.querySelector(".navbar-collapse");

    if (!navbarToggler || !navbarCollapse) return;

    navbarToggler.addEventListener("click", function () {
        // Add animation class
        navbarCollapse.classList.add("collapsing");

        setTimeout(() => {
            navbarCollapse.classList.remove("collapsing");
        }, 350);
    });

    // Close mobile menu when clicking on nav links
    const navLinks = document.querySelectorAll(
        ".navbar-nav .nav-link:not(.dropdown-toggle)"
    );
    navLinks.forEach((link) => {
        link.addEventListener("click", function () {
            if (window.innerWidth < 992) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    hide: true,
                });
            }
        });
    });
}

// Avatar Loading Functionality
function initAvatarLoading() {
    const avatars = document.querySelectorAll(".user-avatar");

    avatars.forEach((avatar) => {
        // Add loading class initially
        avatar.classList.add("loading");

        // Remove loading class when image loads
        avatar.addEventListener("load", function () {
            this.classList.remove("loading");
        });

        // Handle image error
        avatar.addEventListener("error", function () {
            this.classList.remove("loading");
            // Fallback to default avatar
            this.src =
                "https://ui-avatars.com/api/?name=User&background=6c757d&color=fff&size=32";
        });
    });
}

// Smooth Scrolling
function initSmoothScrolling() {
    // Add smooth scrolling to anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });
}

// Utility Functions
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction() {
        const context = this;
        const args = arguments;
        const later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// Handle navbar scroll effect
function initScrollEffect() {
    const navbar = document.querySelector(".navbar");
    if (!navbar) return;

    const handleScroll = debounce(function () {
        if (window.scrollY > 50) {
            navbar.classList.add("navbar-scrolled");
        } else {
            navbar.classList.remove("navbar-scrolled");
        }
    }, 10);

    window.addEventListener("scroll", handleScroll);
}

// Keyboard Navigation
function initKeyboardNavigation() {
    // Handle escape key to close dropdowns
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            // Close all open dropdowns
            const openDropdowns = document.querySelectorAll(
                ".dropdown-menu.show"
            );
            openDropdowns.forEach((dropdown) => {
                dropdown.classList.remove("show");
            });
        }
    });

    // Handle enter key on dropdown toggles
    const dropdownTogglesBtns = document.querySelectorAll(
        '[data-bs-toggle="dropdown"]'
    );
    dropdownTogglesBtns.forEach((toggle) => {
        toggle.addEventListener("keydown", function (e) {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                this.click();
            }
        });
    });
}

// Initialize additional features
document.addEventListener("DOMContentLoaded", function () {
    initScrollEffect();
    initKeyboardNavigation();
});

// Search functionality (if needed)
function initSearch() {
    const searchInput = document.getElementById("searchInput");
    if (!searchInput) return;

    searchInput.addEventListener(
        "input",
        debounce(function (e) {
            const query = e.target.value.trim();
            if (query.length >= 3) {
                // Perform search
                console.log("Searching for:", query);
                // Implement your search logic here
            }
        }, 300)
    );
}

// Theme switcher (if needed)
function initThemeSwitcher() {
    const themeSwitcher = document.getElementById("themeSwitcher");
    if (!themeSwitcher) return;

    themeSwitcher.addEventListener("click", function () {
        const currentTheme = document.body.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        document.body.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);
    });

    // Load saved theme
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        document.body.setAttribute("data-theme", savedTheme);
    }
}

// Add CSS animations
const style = document.createElement("style");
style.textContent = `
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .navbar-scrolled {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        background-color: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
    }
    
    .collapsing {
        transition: height 0.35s ease;
    }
`;
document.head.appendChild(style);
