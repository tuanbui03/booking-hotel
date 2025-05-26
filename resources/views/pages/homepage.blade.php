@extends('layouts.header')

@section('title', 'Trang chủ')

@push('styles')
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title fade-in">Tìm kiếm khách sạn hoàn hảo</h1>
                <p class="hero-subtitle fade-in">Khám phá hàng ngàn khách sạn tuyệt vời với giá tốt nhất</p>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <div class="container">
        <div class="search-form fade-in">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="destination" placeholder="Điểm đến">
                        <label for="destination">
                            <i class="bi bi-geo-alt me-2"></i>Điểm đến
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="checkin">
                        <label for="checkin">
                            <i class="bi bi-calendar-check me-2"></i>Ngày nhận phòng
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="checkout">
                        <label for="checkout">
                            <i class="bi bi-calendar-x me-2"></i>Ngày trả phòng
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-search btn-primary w-100 h-100">
                        <i class="bi bi-search me-2"></i>Tìm kiếm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hotels Section -->
    <section id="hotels" class="py-5">
        <div class="container">
            <h2 class="section-title">Khách sạn nổi bật</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="hotel-card fade-in">
                        <div class="hotel-image"
                            style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=500&h=300&fit=crop')">
                            <button class="wishlist-btn" onclick="toggleWishlist(this)">
                                <i class="bi bi-heart"></i>
                            </button>
                            <span class="hotel-badge text-success">
                                <i class="bi bi-star-fill me-1"></i>Phổ biến
                            </span>
                        </div>
                        <div class="hotel-info">
                            <h3 class="hotel-name">Grand Hotel Saigon</h3>
                            <div class="hotel-location">
                                <i class="bi bi-geo-alt me-2"></i>
                                Quận 1, TP. Hồ Chí Minh
                            </div>
                            <div class="hotel-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <span class="rating-text">(4.8) - 156 đánh giá</span>
                            </div>
                            <div class="hotel-price">
                                2,500,000₫
                                <span class="price-unit">/đêm</span>
                            </div>
                            <button class="btn btn-book w-100">
                                <i class="bi bi-calendar-check me-2"></i>Đặt ngay
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="hotel-card fade-in">
                        <div class="hotel-image"
                            style="background-image: url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=500&h=300&fit=crop')">
                            <button class="wishlist-btn" onclick="toggleWishlist(this)">
                                <i class="bi bi-heart"></i>
                            </button>
                            <span class="hotel-badge text-warning">
                                <i class="bi bi-gem me-1"></i>Cao cấp
                            </span>
                        </div>
                        <div class="hotel-info">
                            <h3 class="hotel-name">Lotte Hotel Hanoi</h3>
                            <div class="hotel-location">
                                <i class="bi bi-geo-alt me-2"></i>
                                Ba Đình, Hà Nội
                            </div>
                            <div class="hotel-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <span class="rating-text">(4.9) - 203 đánh giá</span>
                            </div>
                            <div class="hotel-price">
                                3,200,000₫
                                <span class="price-unit">/đêm</span>
                            </div>
                            <button class="btn btn-book w-100">
                                <i class="bi bi-calendar-check me-2"></i>Đặt ngay
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="hotel-card fade-in">
                        <div class="hotel-image"
                            style="background-image: url('https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=500&h=300&fit=crop')">
                            <button class="wishlist-btn" onclick="toggleWishlist(this)">
                                <i class="bi bi-heart"></i>
                            </button>
                            <span class="hotel-badge text-primary">
                                <i class="bi bi-percent me-1"></i>Giảm giá
                            </span>
                        </div>
                        <div class="hotel-info">
                            <h3 class="hotel-name">InterContinental Danang</h3>
                            <div class="hotel-location">
                                <i class="bi bi-geo-alt me-2"></i>
                                Ngũ Hành Sơn, Đà Nẵng
                            </div>
                            <div class="hotel-rating">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <span class="rating-text">(4.7) - 89 đánh giá</span>
                            </div>
                            <div class="hotel-price">
                                1,800,000₫
                                <span class="price-unit">/đêm</span>
                            </div>
                            <button class="btn btn-book w-100">
                                <i class="bi bi-calendar-check me-2"></i>Đặt ngay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Section -->
    <section id="rooms" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Phòng khách sạn</h2>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="room-card fade-in">
                        <div class="room-image"
                            style="background-image: url('https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=500&h=300&fit=crop')">
                        </div>
                        <div class="room-info">
                            <h4 class="room-name">Deluxe Ocean View</h4>
                            <div class="room-features">
                                <span class="feature-tag">
                                    <i class="bi bi-wifi me-1"></i>WiFi miễn phí
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-tv me-1"></i>Smart TV
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-snow3 me-1"></i>Điều hòa
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-cup-hot me-1"></i>Mini bar
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="hotel-price">
                                    1,200,000₫
                                    <span class="price-unit">/
                                        <span class="price-unit">/đêm</span>
                                </div>
                                <button class="btn btn-book">
                                    <i class="bi bi-calendar-check me-1"></i>Đặt phòng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="room-card fade-in">
                        <div class="room-image"
                            style="background-image: url('https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=500&h=300&fit=crop')">
                        </div>
                        <div class="room-info">
                            <h4 class="room-name">Executive Suite</h4>
                            <div class="room-features">
                                <span class="feature-tag">
                                    <i class="bi bi-wifi me-1"></i>WiFi cao tốc
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-water me-1"></i>Jacuzzi
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-door-open me-1"></i>Ban công
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-telephone me-1"></i>24/7 Service
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="hotel-price">
                                    2,800,000₫
                                    <span class="price-unit">/đêm</span>
                                </div>
                                <button class="btn btn-book">
                                    <i class="bi bi-calendar-check me-1"></i>Đặt phòng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="room-card fade-in">
                        <div class="room-image"
                            style="background-image: url('https://images.unsplash.com/photo-1590490360182-c33d57733427?w=500&h=300&fit=crop')">
                        </div>
                        <div class="room-info">
                            <h4 class="room-name">Standard Twin</h4>
                            <div class="room-features">
                                <span class="feature-tag">
                                    <i class="bi bi-wifi me-1"></i>WiFi
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-tv me-1"></i>Cable TV
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-snow3 me-1"></i>AC
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-droplet me-1"></i>Tắm đứng
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="hotel-price">
                                    800,000₫
                                    <span class="price-unit">/đêm</span>
                                </div>
                                <button class="btn btn-book">
                                    <i class="bi bi-calendar-check me-1"></i>Đặt phòng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="room-card fade-in">
                        <div class="room-image"
                            style="background-image: url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=500&h=300&fit=crop')">
                        </div>
                        <div class="room-info">
                            <h4 class="room-name">Presidential Suite</h4>
                            <div class="room-features">
                                <span class="feature-tag">
                                    <i class="bi bi-wifi me-1"></i>Fiber Internet
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-house me-1"></i>Living Room
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-cup-straw me-1"></i>Butler Service
                                </span>
                                <span class="feature-tag">
                                    <i class="bi bi-car-front me-1"></i>Limousine
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="hotel-price">
                                    5,500,000₫
                                    <span class="price-unit">/đêm</span>
                                </div>
                                <button class="btn btn-book">
                                    <i class="bi bi-calendar-check me-1"></i>Đặt phòng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wishlist Section -->
    <section id="wishlist" class="wishlist-section">
        <div class="container">
            <h2 class="section-title text-white">Khách sạn được đánh giá cao</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="wishlist-card fade-in">
                        <div class="wishlist-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h4>Hotel Royal Saigon</h4>
                        <p class="mb-3">Đánh giá: 4.9/5 ⭐</p>
                        <p>"Dịch vụ tuyệt vời, vị trí thuận tiện, phòng ốc sang trọng. Đây là lựa chọn hoàn hảo cho chuyến
                            công tác."</p>
                        <button class="btn btn-outline-light mt-3">
                            <i class="bi bi-eye me-2"></i>Xem chi tiết
                        </button>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="wishlist-card fade-in">
                        <div class="wishlist-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h4>Paradise Resort Phu Quoc</h4>
                        <p class="mb-3">Đánh giá: 4.8/5 ⭐</p>
                        <p>"Resort tuyệt đẹp bên bờ biển, nhân viên thân thiện, buffet phong phú. Kỳ nghỉ không thể nào
                            quên!"</p>
                        <button class="btn btn-outline-light mt-3">
                            <i class="bi bi-eye me-2"></i>Xem chi tiết
                        </button>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="wishlist-card fade-in">
                        <div class="wishlist-icon">
                            <i class="bi bi-gem"></i>
                        </div>
                        <h4>Metropole Hanoi</h4>
                        <p class="mb-3">Đánh giá: 4.9/5 ⭐</p>
                        <p>"Khách sạn lịch sử với kiến trúc Pháp cổ điển, dịch vụ 5 sao, spa đẳng cấp thế giới. Trải nghiệm
                            không thể bỏ qua tại Hà Nội."</p>
                        <button class="btn btn-outline-light mt-3">
                            <i class="bi bi-eye me-2"></i>Xem chi tiết
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-light btn-lg">
                    <i class="bi bi-heart me-2"></i>Xem tất cả Wishlist
                </button>
            </div>
        </div>
    </section>
@endsection
