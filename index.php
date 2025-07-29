<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sheraton Hotels - Experience Luxury</title>
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
        
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://www.marriott.com/content/dam/marriott-homepage/destinations/hero-destinations-beach.jpg.transform/mcom-hp-transform-1440x900/image.jpg');
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
        }
        
        .hero-content {
            max-width: 600px;
            margin-left: 50px;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .search-box {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            position: absolute;
            bottom: -80px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 1000px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group label {
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        .form-group input, .form-group select {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .search-btn {
            background-color: #b69b5e;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .search-btn:hover {
            background-color: #a38a4d;
        }
        
        .features {
            margin-top: 120px;
            padding: 50px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
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
            line-height: 1.6;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-img {
            height: 200px;
            overflow: hidden;
        }
        
        .feature-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .feature-card:hover .feature-img img {
            transform: scale(1.1);
        }
        
        .feature-content {
            padding: 20px;
        }
        
        .feature-content h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #002d5c;
        }
        
        .feature-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .feature-content .price {
            font-size: 24px;
            color: #b69b5e;
            font-weight: bold;
            margin-bottom: 15px;
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
        
        .testimonials {
            background-color: #f0f2f5;
            padding: 80px 0;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .testimonial-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .testimonial-content {
            margin-bottom: 20px;
            font-style: italic;
            line-height: 1.6;
            color: #555;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .author-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .author-info h4 {
            font-size: 18px;
            margin-bottom: 5px;
            color: #002d5c;
        }
        
        .author-info p {
            color: #666;
            font-size: 14px;
        }
        
        .rating {
            color: #b69b5e;
            margin-top: 5px;
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
        
        @media (max-width: 768px) {
            .hero {
                height: 500px;
            }
            
            .hero-content {
                margin-left: 20px;
                max-width: 90%;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .search-box {
                position: static;
                transform: none;
                width: 90%;
                margin: -50px auto 0;
            }
            
            .search-form {
                grid-template-columns: 1fr;
            }
            
            .features {
                margin-top: 50px;
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
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Experience Luxury & Comfort</h1>
            <p>Discover the perfect blend of elegance, comfort, and world-class service at Sheraton Hotels. Your journey to extraordinary experiences begins here.</p>
        </div>
        
        <!-- Search Box -->
        <div class="search-box">
            <form class="search-form" action="results.php" method="GET">
                <div class="form-group">
                    <label for="location">Location</label>
                    <select id="location" name="location" required>
                        <option value="">Select Location</option>
                        <?php
                        $sql = "SELECT DISTINCT location FROM hotels ORDER BY location";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["location"] . "'>" . $row["location"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="check-in">Check In</label>
                    <input type="date" id="check-in" name="check_in" required min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="check-out">Check Out</label>
                    <input type="date" id="check-out" name="check_out" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                </div>
                <div class="form-group">
                    <label for="guests">Guests</label>
                    <select id="guests" name="guests" required>
                        <option value="1">1 Guest</option>
                        <option value="2" selected>2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                        <option value="5">5+ Guests</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="search">&nbsp;</label>
                    <button type="submit" class="search-btn">Search Rooms</button>
                </div>
            </form>
        </div>
    </section>
    
    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Our Featured Rooms</h2>
                <p>Experience luxury and comfort in our carefully designed rooms and suites, each offering a unique blend of elegance and modern amenities.</p>
            </div>
            
            <div class="features-grid">
                <?php
                // Get featured room types
                $sql = "SELECT rt.*, h.name as hotel_name, h.location 
                        FROM room_types rt 
                        JOIN hotels h ON rt.hotel_id = h.hotel_id 
                        LIMIT 3";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="feature-card">
                            <div class="feature-img">
                                <img src="' . (empty($row["image_url"]) ? 'https://via.placeholder.com/600x400?text=Sheraton+' . urlencode($row["name"]) : $row["image_url"]) . '" alt="' . $row["name"] . '">
                            </div>
                            <div class="feature-content">
                                <h3>' . $row["name"] . '</h3>
                                <p>' . substr($row["description"], 0, 100) . '...</p>
                                <div class="price">$' . number_format($row["price_per_night"], 2) . ' <span>/ night</span></div>
                                <a href="room_details.php?id=' . $row["room_type_id"] . '" class="btn">View Details</a>
                            </div>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Guests Say</h2>
                <p>Read genuine reviews from our valued guests who have experienced the Sheraton hospitality firsthand.</p>
            </div>
            
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"The Sheraton experience was beyond my expectations. The staff was incredibly attentive, the room was immaculate, and the amenities were top-notch. I'll definitely be returning on my next business trip."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
                        </div>
                        <div class="author-info">
                            <h4>John Smith</h4>
                            <p>Business Traveler</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"Our family vacation at Sheraton Resort was magical. The kids loved the pool, and we enjoyed the spa services. The room was spacious and comfortable. Perfect for a family getaway!"</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Family Traveler</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"The Sheraton Grand exceeded all expectations for our honeymoon. The romantic atmosphere, exceptional dining options, and breathtaking views made our stay unforgettable."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <img src="https://randomuser.me/api/portraits/men/28.jpg" alt="Michael Davis">
                        </div>
                        <div class="author-info">
                            <h4>Michael Davis</h4>
                            <p>Couple Traveler</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
        // JavaScript for date validation
        document.addEventListener('DOMContentLoaded', function() {
            const checkInInput = document.getElementById('check-in');
            const checkOutInput = document.getElementById('check-out');
            
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
    </script>
</body>
</html>
