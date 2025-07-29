<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Sheraton Hotels</title>
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
        
        .search-results {
            padding: 60px 0;
        }
        
        .results-container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 30px;
        }
        
        .filter-sidebar {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: fit-content;
        }
        
        .filter-section {
            margin-bottom: 25px;
        }
        
        .filter-section h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #002d5c;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }
        
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .filter-option {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .filter-option input {
            width: 18px;
            height: 18px;
            accent-color: #b69b5e;
        }
        
        .price-range {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .price-inputs {
            display: flex;
            gap: 10px;
        }
        
        .price-inputs input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .filter-btn {
            background-color: #b69b5e;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 20px;
        }
        
        .filter-btn:hover {
            background-color: #a38a4d;
        }
        
        .results-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .result-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: grid;
            grid-template-columns: 300px 1fr;
        }
        
        .result-img {
            height: 100%;
            overflow: hidden;
        }
        
        .result-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .result-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        
        .result-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .result-title h3 {
            font-size: 22px;
            margin-bottom: 5px;
            color: #002d5c;
        }
        
        .result-title p {
            color: #666;
        }
        
        .result-price {
            text-align: right;
        }
        
        .result-price .price {
            font-size: 24px;
            color: #b69b5e;
            font-weight: bold;
        }
        
        .result-price .per-night {
            color: #666;
            font-size: 14px;
        }
        
        .result-description {
            margin-bottom: 15px;
            line-height: 1.6;
            color: #555;
            flex-grow: 1;
        }
        
        .result-amenities {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .amenity {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
            font-size: 14px;
        }
        
        .amenity i {
            color: #b69b5e;
        }
        
        .result-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .room-availability {
            color: #28a745;
            font-weight: 500;
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
        
        .no-results {
            text-align: center;
            padding: 50px 0;
        }
        
        .no-results h2 {
            font-size: 24px;
            color: #002d5c;
            margin-bottom: 15px;
        }
        
        .no-results p {
            color: #666;
            margin-bottom: 20px;
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
        
        @media (max-width: 992px) {
            .results-container {
                grid-template-columns: 1fr;
            }
            
            .filter-sidebar {
                order: 1;
            }
            
            .results-list {
                order: 2;
            }
        }
        
        @media (max-width: 768px) {
            .result-card {
                grid-template-columns: 1fr;
            }
            
            .result-img {
                height: 200px;
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
    
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Search Results</h1>
            <div class="breadcrumb">
                <a href="index.php">Home</a>
                <span>/</span>
                <span>Search Results</span>
            </div>
        </div>
    </section>
    
    <!-- Search Results Section -->
    <section class="search-results">
        <div class="container">
            <?php
            // Get search parameters
            $location = isset($_GET['location']) ? $_GET['location'] : '';
            $check_in = isset($_GET['check_in']) ? $_GET['check_in'] : '';
            $check_out = isset($_GET['check_out']) ? $_GET['check_out'] : '';
            $guests = isset($_GET['guests']) ? (int)$_GET['guests'] : 2;
            
            // Get filter parameters
            $min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;
            $max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : 10000;
            $amenities = isset($_GET['amenities']) ? $_GET['amenities'] : [];
            
            // Build query
            $sql = "SELECT rt.*, h.name as hotel_name, h.location, h.address 
                    FROM room_types rt 
                    JOIN hotels h ON rt.hotel_id = h.hotel_id 
                    WHERE 1=1";
            
            // Add filters
            if (!empty($location)) {
                $sql .= " AND h.location = '$location'";
            }
            
            if ($guests > 0) {
                $sql .= " AND rt.capacity >= $guests";
            }
            
            $sql .= " AND rt.price_per_night BETWEEN $min_price AND $max_price";
            
            // Execute query
            $result = $conn->query($sql);
            
            // Get all amenities for filter
            $amenities_sql = "SELECT * FROM amenities ORDER BY name";
            $amenities_result = $conn->query($amenities_sql);
            $all_amenities = [];
            if ($amenities_result->num_rows > 0) {
                while($row = $amenities_result->fetch_assoc()) {
                    $all_amenities[] = $row;
                }
            }
            
            // Get min and max prices for filter
            $price_sql = "SELECT MIN(price_per_night) as min_price, MAX(price_per_night) as max_price FROM room_types";
            $price_result = $conn->query($price_sql);
            $price_range = $price_result->fetch_assoc();
            $db_min_price = $price_range['min_price'];
            $db_max_price = $price_range['max_price'];
            ?>
            
            <div class="results-container">
                <!-- Filter Sidebar -->
                <div class="filter-sidebar">
                    <form action="results.php" method="GET">
                        <!-- Keep original search parameters -->
                        <input type="hidden" name="location" value="<?php echo htmlspecialchars($location); ?>">
                        <input type="hidden" name="check_in" value="<?php echo htmlspecialchars($check_in); ?>">
                        <input type="hidden" name="check_out" value="<?php echo htmlspecialchars($check_out); ?>">
                        <input type="hidden" name="guests" value="<?php echo htmlspecialchars($guests); ?>">
                        
                        <div class="filter-section">
                            <h3>Price Range</h3>
                            <div class="price-range">
                                <div class="price-inputs">
                                    <input type="number" name="min_price" placeholder="Min Price" value="<?php echo $min_price > 0 ? $min_price : $db_min_price; ?>" min="<?php echo $db_min_price; ?>" max="<?php echo $db_max_price; ?>">
                                    <input type="number" name="max_price" placeholder="Max Price" value="<?php echo $max_price < 10000 ? $max_price : $db_max_price; ?>" min="<?php echo $db_min_price; ?>" max="<?php echo $db_max_price; ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="filter-section">
                            <h3>Amenities</h3>
                            <div class="filter-options">
                                <?php foreach ($all_amenities as $amenity): ?>
                                <div class="filter-option">
                                    <input type="checkbox" id="amenity-<?php echo $amenity['amenity_id']; ?>" name="amenities[]" value="<?php echo $amenity['amenity_id']; ?>" <?php echo in_array($amenity['amenity_id'], $amenities) ? 'checked' : ''; ?>>
                                    <label for="amenity-<?php echo $amenity['amenity_id']; ?>"><?php echo $amenity['name']; ?></label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <button type="submit" class="filter-btn">Apply Filters</button>
                    </form>
                </div>
                
                <!-- Results List -->
                <div class="results-list">
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            // Get room amenities
                            $room_amenities_sql = "SELECT a.name, a.icon 
                                                FROM amenities a 
                                                JOIN room_amenities ra ON a.amenity_id = ra.amenity_id 
                                                WHERE ra.room_type_id = " . $row['room_type_id'] . " 
                                                LIMIT 4";
                            $room_amenities_result = $conn->query($room_amenities_sql);
                            $room_amenities = [];
                            if ($room_amenities_result->num_rows > 0) {
                                while($amenity = $room_amenities_result->fetch_assoc()) {
                                    $room_amenities[] = $amenity;
                                }
                            }
                            
                            // Get available rooms count
                            $rooms_sql = "SELECT COUNT(*) as available_count 
                                        FROM rooms 
                                        WHERE room_type_id = " . $row['room_type_id'] . " 
                                        AND status = 'available'";
                            $rooms_result = $conn->query($rooms_sql);
                            $rooms_data = $rooms_result->fetch_assoc();
                            $available_rooms = $rooms_data['available_count'];
                            
                            echo '<div class="result-card">
                                <div class="result-img">
                                    <img src="' . (empty($row["image_url"]) ? 'https://via.placeholder.com/600x400?text=Sheraton+' . urlencode($row["name"]) : $row["image_url"]) . '" alt="' . $row["name"] . '">
                                </div>
                                <div class="result-content">
                                    <div class="result-header">
                                        <div class="result-title">
                                            <h3>' . $row["name"] . '</h3>
                                            <p>' . $row["hotel_name"] . ' - ' . $row["location"] . '</p>
                                        </div>
                                        <div class="result-price">
                                            <div class="price">$' . number_format($row["price_per_night"], 2) . '</div>
                                            <div class="per-night">per night</div>
                                        </div>
                                    </div>
                                    <div class="result-description">
                                        ' . $row["description"] . '
                                    </div>
                                    <div class="result-amenities">';
                                    
                            foreach ($room_amenities as $amenity) {
                                echo '<div class="amenity">
                                        <i class="fas fa-' . (!empty($amenity["icon"]) ? $amenity["icon"] : "check") . '"></i>
                                        <span>' . $amenity["name"] . '</span>
                                    </div>';
                            }
                                    
                            echo '</div>
                                    <div class="result-actions">
                                        <div class="room-availability">
                                            <i class="fas fa-check-circle"></i> ' . $available_rooms . ' rooms available
                                        </div>
                                        <a href="room_details.php?id=' . $row["room_type_id"] . '&check_in=' . urlencode($check_in) . '&check_out=' . urlencode($check_out) . '&guests=' . urlencode($guests) . '" class="btn">View Details</a>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<div class="no-results">
                            <h2>No Rooms Found</h2>
                            <p>We couldn\'t find any rooms matching your search criteria. Please try different search parameters.</p>
                            <a href="index.php" class="btn">Back to Search</a>
                        </div>';
                    }
                    ?>
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
        // JavaScript for filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            // You can add additional JavaScript functionality here if needed
        });
    </script>
</body>
</html>
