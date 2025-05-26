// Wishlist functionality
function toggleWishlist(btn) {
    const icon = btn.querySelector("i");
    btn.classList.toggle("active");

    if (btn.classList.contains("active")) {
        icon.className = "bi bi-heart-fill";
        btn.style.background = "#dc3545";
        btn.style.color = "white";

        // Show notification
        showNotification("Đã thêm vào wishlist!", "success");
    } else {
        icon.className = "bi bi-heart";
        btn.style.background = "rgba(255,255,255,0.9)";
        btn.style.color = "inherit";

        showNotification("Đã xóa khỏi wishlist!", "info");
    }
}

// Notification system
function showNotification(message, type) {
    const notification = document.createElement("div");
    notification.className = `alert alert-${type} position-fixed`;
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        border: none;
        border-radius: 10px;
    `;
    notification.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            ${message}
        </div>
    `;

    document.body.appendChild(notification);

    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Search functionality
document.addEventListener("DOMContentLoaded", function () {
    const searchBtn = document.querySelector(".btn-search");
    if (searchBtn) {
        searchBtn.addEventListener("click", function () {
            const destination = document.getElementById("destination").value;
            const checkin = document.getElementById("checkin").value;
            const checkout = document.getElementById("checkout").value;

            if (!destination || !checkin || !checkout) {
                showNotification(
                    "Vui lòng điền đầy đủ thông tin tìm kiếm!",
                    "warning"
                );
                return;
            }

            // Simulate search
            this.innerHTML = '<i class="bi bi-search me-2"></i>Đang tìm...';
            this.disabled = true;

            setTimeout(() => {
                this.innerHTML = '<i class="bi bi-search me-2"></i>Tìm kiếm';
                this.disabled = false;
                showNotification(
                    `Tìm thấy 25 khách sạn tại ${destination}!`,
                    "success"
                );
            }, 2000);
        });
    }
});

// Animate elements on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.animation = "fadeInUp 0.6s ease-out forwards";
        }
    });
}, observerOptions);

// Observe all cards
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(
        ".hotel-card, .room-card, .wishlist-card"
    );
    cards.forEach((card) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(30px)";
        observer.observe(card);
    });

    // Set minimum dates for date inputs
    const today = new Date().toISOString().split("T")[0];
    const checkinInput = document.getElementById("checkin");
    const checkoutInput = document.getElementById("checkout");

    if (checkinInput) checkinInput.min = today;
    if (checkoutInput) checkoutInput.min = today;

    // Update checkout min date when checkin changes
    if (checkinInput) {
        checkinInput.addEventListener("change", function () {
            const checkinDate = new Date(this.value);
            checkinDate.setDate(checkinDate.getDate() + 1);
            if (checkoutInput) {
                checkoutInput.min = checkinDate.toISOString().split("T")[0];
            }
        });
    }

    // Book room functionality
    document.querySelectorAll(".btn-book").forEach((btn) => {
        btn.addEventListener("click", function () {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="bi bi-check me-2"></i>Đã đặt!';
            this.classList.remove("btn-book");
            this.classList.add("btn-success");
            this.disabled = true;

            showNotification(
                "Đặt phòng thành công! Chúng tôi sẽ liên hệ với bạn sớm.",
                "success"
            );

            setTimeout(() => {
                this.innerHTML = originalText;
                this.classList.remove("btn-success");
                this.classList.add("btn-book");
                this.disabled = false;
            }, 3000);
        });
    });
});
