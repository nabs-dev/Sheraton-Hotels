<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details - Sheraton Hotels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        
        .header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .top-bar {
            background-color: #002d5c;
            color: white;
            padding: 10px 0;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .top-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .contact-info {
            display: flex;
            gap: 20px;
        }
        
        .contact-info a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
        }
        
        .social-icons a {
            color: white;
            font-size: 14px;
        }
        
        .main-header {
            padding: 20px 0;
        }
        
        .main-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #002d5c;
            text-decoration: none;
        }
        
        .logo span {
            color: #b69b5e;
        }
        
        .nav-menu {
            display: flex;
            gap: 30px;
        }
        
        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-menu a:hover {
            color: #b69b5e;
        }
        
        .page-header {
            background-color: #002d5c;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        
        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        
        .breadcrumb a {
            color: #b69b5e;
            text-decoration: none;
        }
        
        .room-details {
            padding: 60px 0;
        }
        
        .room-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }
        
        .room-gallery {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .main-image {
            width: 100%;
            height: 400px;
            overflow: hidden;
        }
        
        .main-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .thumbnail-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            padding: 20px;
        }
        
        .thumbnail {
            height: 80px;
            overflow: hidden;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        
        .thumbnail:hover, .thumbnail.active {
            opacity: 1;
        }
        
        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .room-info {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .room-title h2 {
            font-size: 28px;
            color: #002d5c;
            margin-bottom: 10px;
        }
        
        .room-title p {
            color: #666;
            margin-bottom: 20px;
        }
        
        .room-price {
            font-size: 24px;
            color: #b69b5e;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .room-price span {
            font-size: 16px;
            color: #666;
            font-weight: normal;
        }
        
        .room-features {
            margin-bottom: 20px;
        }
        
        .room-features h3 {
            font-size: 18px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .features-list {
            list-style: none;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .features-list li {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .features-list i {
            color: #b69b5e;
        }
        
        .booking-form {
            margin-top: 30px;
        }
        
        .booking-form h3 {
            font-size: 18px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .book-btn {
            background-color: #b69b5e;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }
        
        .book-btn:hover {
            background-color: #a38a4d;
        }
        
        .room-description {
            margin-top: 30px;
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            grid-column: 1 / -1;
        }
        
        .room-description h3 {
            font-size: 22px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .room-description p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
        }
        
        .amenities-section {
            margin-top: 20px;
        }
        
        .amenities-section h4 {
            font-size: 18px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .amenity-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .amenity-item i {
            color: #b69b5e;
        }
        
        .policies-section {
            margin-top: 30px;
        }
        
        .policies-section h4 {
            font-size: 18px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .policies-list {
            list-style: none;
        }
        
        .policies-list li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        
        .policies-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #b69b5e;
        }
        
        .similar-rooms {
            padding: 60px 0;
            background-color: #f0f2f5;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            font-size: 36px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .section-title p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .rooms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .room-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        
        .room-card:hover {
            transform: translateY(-10px);
        }
        
        .room-card-img {
            height: 200px;
            overflow: hidden;
        }
        
        .room-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .room-card:hover .room-card-img img {
            transform: scale(1.1);
        }
        
        .room-card-content {
            padding: 20px;
        }
        
        .room-card-content h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #002d5c;
        }
        
        .room-card-content p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .room-card-price {
            font-size: 20px;
            color: #b69b5e;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .room-card-price span {
            font-size: 14px;
            color: #666;
            font-weight: normal;
        }
        
        .btn {
            display: inline-block;
            background-color: #002d5c;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #001f3f;
        }
        
        .footer {
            background-color: #002d5c;
            color: white;
            padding: 80px 0 20px;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .footer-col h3 {
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-col h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: #b69b5e;
        }
        
        .footer-col p {
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: #b69b5e;
        }
        
        .contact-info-footer {
            margin-bottom: 20px;
        }
        
        .contact-info-footer p {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .contact-info-footer i {
            margin-right: 10px;
            color: #b69b5e;
        }
        
        .newsletter form {
            display: flex;
            margin-top: 20px;
        }
        
        .newsletter input {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px 0 0 5px;
        }
        
        .newsletter button {
            background-color: #b69b5e;
            color: white;
            border: none;
            padding: 0 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            text-align: center;
            position: relative;
            animation: modalopen 0.5s;
        }
        
        @keyframes modalopen {
            from {opacity: 0; transform: translateY(-60px);}
            to {opacity: 1; transform: translateY(0);}
        }
        
        .close-modal {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 28px;
            font-weight: bold;
            color: #aaa;
            cursor: pointer;
        }
        
        .close-modal:hover {
            color: #333;
        }
        
        .modal-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }
        
        .modal-title {
            font-size: 24px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .modal-text {
            color: #666;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .modal-btn {
            background-color: #b69b5e;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .modal-btn:hover {
            background-color: #a38a4d;
        }
        
        @media (max-width: 992px) {
            .room-container {
                grid-template-columns: 1fr;
            }
            
            .thumbnail-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .thumbnail-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .features-list {
                grid-template-columns: 1fr;
            }
            
            .nav-menu {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="contact-info">
                <a href="tel:+18001234567"><i class="fas fa-phone"></i> +1 800 123 4567</a>
                <a href="mailto:info@sheraton.com"><i class="fas fa-envelope"></i> info@sheraton.com</a>
            </div>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <header class="header">
        <div class="main-header">
            <div class="container">
                <a href="index.php" class="logo">SHERATON <span>HOTELS</span></a>
                <nav class="nav-menu">
                    <a href="index.php">Home</a>
                    <a href="#">About</a>
                    <a href="#">Rooms</a>
                    <a href="#">Dining</a>
                    <a href="#">Amenities</a>
                    <a href="#">Gallery</a>
                    <a href="#">Contact</a>
                </nav>
            </div>
        </div>
    </header>
    
    <?php
    // Get room ID from URL
    $room_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : date('Y-m-d');
    $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : date('Y-m-d', strtotime('+1 day'));
    $guests = isset($_GET['guests']) ? (int)$_GET['guests'] : 2;
    
    // Process booking form if submitted
    $booking_success = false;
    $booking_message = '';
    $booking_reference = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_room'])) {
        // Get form data
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $guests = $_POST['guests'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        // Generate a booking reference
        $booking_reference = 'SHR' . date('Ymd') . rand(1000, 9999);
        
        // In a real application, you would save this to the database
        // For now, we'll just set a success flag
        $booking_success = true;
        $booking_message = "Your booking has been confirmed! Your booking reference is $booking_reference.";
    }
    
    // Get room details
    $sql = "SELECT rt.*, h.name as hotel_name, h.location, h.address 
            FROM room_types rt 
            JOIN hotels h ON rt.hotel_id = h.hotel_id 
            WHERE rt.room_type_id = $room_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
        
        // Get room amenities
        $amenities_sql = "SELECT a.name, a.icon 
                        FROM amenities a 
                        JOIN room_amenities ra ON a.amenity_id = ra.amenity_id 
                        WHERE ra.room_type_id = $room_id";
        $amenities_result = $conn->query($amenities_sql);
        $amenities = [];
        if ($amenities_result->num_rows > 0) {
            while($amenity = $amenities_result->fetch_assoc()) {
                $amenities[] = $amenity;
            }
        }
        
        // Get available rooms count
        $rooms_sql = "SELECT COUNT(*) as available_count 
                    FROM rooms 
                    WHERE room_type_id = $room_id 
                    AND status = 'available'";
        $rooms_result = $conn->query($rooms_sql);
        $rooms_data = $rooms_result->fetch_assoc();
        $available_rooms = $rooms_data['available_count'];
        
        // Get similar rooms
        $similar_sql = "SELECT rt.*, h.name as hotel_name 
                        FROM room_types rt 
                        JOIN hotels h ON rt.hotel_id = h.hotel_id 
                        WHERE rt.hotel_id = " . $room['hotel_id'] . " 
                        AND rt.room_type_id != $room_id 
                        LIMIT 3";
        $similar_result = $conn->query($similar_sql);
        $similar_rooms = [];
        if ($similar_result->num_rows > 0) {
            while($similar = $similar_result->fetch_assoc()) {
                $similar_rooms[] = $similar;
            }
        }
    ?>
    
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><?php echo $room['name']; ?></h1>
            <div class="breadcrumb">
                <a href="index.php">Home</a>
                <span>/</span>
                <a href="results.php">Rooms</a>
                <span>/</span>
                <span><?php echo $room['name']; ?></span>
            </div>
        </div>
    </section>
    
    <!-- Room Details Section -->
    <section class="room-details">
        <div class="container">
            <div class="room-container">
                <!-- Room Gallery -->
                <div class="room-gallery">
                    <div class="main-image">
                        <img src="<?php echo empty($room["image_url"]) ? 'https://via.placeholder.com/1200x800?text=Sheraton+' . urlencode($room["name"]) : $room["image_url"]; ?>" alt="<?php echo $room["name"]; ?>" id="main-room-image">
                    </div>
                    <div class="thumbnail-grid">
                        <div class="thumbnail active" onclick="changeImage('<?php echo empty($room["image_url"]) ? 'https://via.placeholder.com/1200x800?text=Sheraton+' . urlencode($room["name"]) : $room["image_url"]; ?>')">
                            <img src="<?php echo empty($room["image_url"]) ? 'https://via.placeholder.com/1200x800?text=Sheraton+' . urlencode($room["name"]) : $room["image_url"]; ?>" alt="<?php echo $room["name"]; ?>">
                        </div>
                        <div class="thumbnail" onclick="changeImage('https://via.placeholder.com/1200x800?text=Bathroom')">
                            <img src="https://via.placeholder.com/1200x800?text=Bathroom" alt="Bathroom">
                        </div>
                        <div class="thumbnail" onclick="changeImage('https://via.placeholder.com/1200x800?text=View')">
                            <img src="https://via.placeholder.com/1200x800?text=View" alt="View">
                        </div>
                        <div class="thumbnail" onclick="changeImage('https://via.placeholder.com/1200x800?text=Amenities')">
                            <img src="https://via.placeholder.com/1200x800?text=Amenities" alt="Amenities">
                        </div>
                    </div>
                </div>
                
                <!-- Room Info and Booking -->
                <div class="room-info">
                    <div class="room-title">
                        <h2><?php echo $room['name']; ?></h2>
                        <p><?php echo $room['hotel_name']; ?> - <?php echo $room['location']; ?></p>
                    </div>
                    <div class="room-price">
                        $<?php echo number_format($room['price_per_night'], 2); ?> <span>per night</span>
                    </div>
                    <div class="room-features">
                        <h3>Room Features</h3>
                        <ul class="features-list">
                            <li><i class="fas fa-user"></i> Max <?php echo $room['capacity']; ?> Guests</li>
                            <li><i class="fas fa-bed"></i> King Size Bed</li>
                            <li><i class="fas fa-bath"></i> Private Bathroom</li>
                            <li><i class="fas fa-tv"></i> Flat-screen TV</li>
                            <li><i class="fas fa-wifi"></i> Free WiFi</li>
                            <li><i class="fas fa-snowflake"></i> Air Conditioning</li>
                        </ul>
                    </div>
                    <div class="booking-form">
                        <h3>Book This Room</h3>
                        <form id="bookingForm" method="POST">
                            <input type="hidden" name="book_room" value="1">
                            <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
                            
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="booking-check-in">Check In</label>
                                <input type="date" id="booking-check-in" name="check_in" value="<?php echo $check_in; ?>" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="booking-check-out">Check Out</label>
                                <input type="date" id="booking-check-out" name="check_out" value="<?php echo $check_out; ?>" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="booking-guests">Guests</label>
                                <select id="booking-guests" name="guests" required>
                                    <?php for ($i = 1; $i <= $room['capacity']; $i++): ?>
                                    <option value="<?php echo $i; ?>" <?php echo $i == $guests ? 'selected' : ''; ?>><?php echo $i; ?> Guest<?php echo $i > 1 ? 's' : ''; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <button type="button" class="book-btn" onclick="showBookingConfirmation()">Book Now</button>
                        </form>
                    </div>
                </div>
                
                <!-- Room Description -->
                <div class="room-description">
                    <h3>Room Description</h3>
                    <p><?php echo $room['description']; ?></p>
                    <p>Experience the ultimate in comfort and luxury in our <?php echo $room['name']; ?>. This spacious accommodation offers a perfect blend of elegance and modern amenities to ensure a memorable stay. Wake up to stunning views and enjoy the premium furnishings that create a warm and inviting atmosphere.</p>
                    
                    <div class="amenities-section">
                        <h4>Room Amenities</h4>
                        <div class="amenities-grid">
                            <?php foreach ($amenities as $amenity): ?>
                            <div class="amenity-item">
                                <i class="fas fa-<?php echo !empty($amenity["icon"]) ? $amenity["icon"] : "check"; ?>"></i>
                                <span><?php echo $amenity["name"]; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="policies-section">
                        <h4>Policies</h4>
                        <ul class="policies-list">
                            <li>Check-in time: 3:00 PM</li>
                            <li>Check-out time: 12:00 PM</li>
                            <li>Free cancellation up to 24 hours before check-in</li>
                            <li>No smoking allowed in the room</li>
                            <li>Pets are not allowed</li>
                            <li>Extra bed available upon request (additional charges may apply)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Booking Confirmation Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <div class="modal-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h2 class="modal-title">Booking Confirmed!</h2>
            <p class="modal-text">Your reservation has been successfully confirmed. A confirmation email has been sent to your email address.</p>
            <p class="modal-text">Booking Reference: <strong id="bookingReference">SHR<?php echo date('Ymd') . rand(1000, 9999); ?></strong></p>
            <button class="modal-btn" onclick="closeModal()">Continue</button>
        </div>
    </div>
    
    <!-- Similar Rooms Section -->
    <section class="similar-rooms">
        <div class="container">
            <div class="section-title">
                <h2>Similar Rooms</h2>
                <p>Explore other room options at <?php echo $room['hotel_name']; ?> that might suit your needs.</p>
            </div>
            
            <div class="rooms-grid">
                <?php foreach ($similar_rooms as $similar): ?>
                <div class="room-card">
                    <div class="room-card-img">
                        <img src="<?php echo empty($similar["image_url"]) ? 'https://via.placeholder.com/600x400?text=Sheraton+' . urlencode($similar["name"]) : $similar["image_url"]; ?>" alt="<?php echo $similar["name"]; ?>">
                    </div>
                    <div class="room-card-content">
                        <h3><?php echo $similar["name"]; ?></h3>
                        <p><?php echo substr($similar["description"], 0, 100); ?>...</p>
                        <div class="room-card-price">
                            $<?php echo number_format($similar["price_per_night"], 2); ?> <span>/ night</span>
                        </div>
                        <a href="room_details.php?id=<?php echo $similar["room_type_id"]; ?>&check_in=<?php echo urlencode($check_in); ?>&check_out=<?php echo urlencode($check_out); ?>&guests=<?php echo urlencode($guests); ?>" class="btn">View Details</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <?php
    } else {
        // Room not found
        echo '<div class="container" style="padding: 100px 0; text-align: center;">
            <h2>Room Not Found</h2>
            <p>The room you are looking for does not exist or has been removed.</p>
            <a href="index.php" class="btn" style="margin-top: 20px;">Back to Home</a>
        </div>';
    }
    ?>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>About Sheraton</h3>
                    <p>Sheraton Hotels & Resorts is an international hotel chain owned by Marriott International. With over 400 hotels worldwide, we offer exceptional service and luxury accommodations for both business and leisure travelers.</p>
                </div>
                
                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Rooms</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Dining</a></li>
                        <li><a href="#">Special Offers</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h3>Contact Us</h3>
                    <div class="contact-info-footer">
                        <p><i class="fas fa-map-marker-alt"></i> 123 Hotel Street, New York, NY 10001</p>
                        <p><i class="fas fa-phone"></i> +1 800 123 4567</p>
                        <p><i class="fas fa-envelope"></i> info@sheraton.com</p>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter to receive special offers and updates.</p>
                    <div class="newsletter">
                        <form>
                            <input type="email" placeholder="Your Email Address">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 Sheraton Hotels. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for image gallery
        function changeImage(src) {
            document.getElementById('main-room-image').src = src;
            
            // Update active thumbnail
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => {
                if (thumb.querySelector('img').src === src) {
                    thumb.classList.add('active');
                } else {
                    thumb.classList.remove('active');
                }
            });
        }
        
        // JavaScript for date validation
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('booking-check-in');
            const checkOutInput = document.getElementById('booking-check-out');
            
            checkInInput.addEventListener('change', function() {
                const checkInDate = new Date(this.value);
                const nextDay = new Date(checkInDate);
                nextDay.setDate(nextDay.getDate() + 1);
                
                const year = nextDay.getFullYear();
                const month = String(nextDay.getMonth() + 1).padStart(2, '0');
                const day = String(nextDay.getDate()).padStart(2, '0');
                
                checkOutInput.min = `${year}-${month}-${day}`;
                
                if (checkOutInput.value && new Date(checkOutInput.value) <= checkInDate) {
                    checkOutInput.value = `${year}-${month}-${day}`;
                }
            });
        });
        
        // Booking confirmation modal
        const modal = document.getElementById('bookingModal');
        
        function showBookingConfirmation() {
            // Validate the form
            const form = document.getElementById('bookingForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            // Generate a random booking reference
            const bookingRef = 'SHR' + new Date().toISOString().slice(0,10).replace(/-/g,'') + Math.floor(1000 + Math.random() * 9000);
            document.getElementById('bookingReference').textContent = bookingRef;
            
            // Show the modal
            modal.style.display = 'block';
            
            // In a real application, you would submit the form to the server here
            // For now, we're just showing the confirmation modal
        }
        
        function closeModal() {
            modal.style.display = 'none';
            
            // Redirect to the homepage or another page
            // window.location.href = 'index.php';
        }
        
        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
