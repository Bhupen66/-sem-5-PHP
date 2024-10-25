<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Management System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FDCBFF;            
        }

        /* Custom Navbar */
        .navbar {
            background-color:  #5B4E61;        
            position: fixed;
            top: 0;
            width: 100%;
            padding: 15px;
            border-radius: 20px ; /* Remove rounded corners when it's fixed */
            z-index: 1000; /* Ensures the navbar stays on top of other elements */
            transition: background-color 0.3s ease; /* Optional: Adds a smooth effect for color change */

       }

        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
        }
        nav a{
            color:#666;

        }
        

        .navbar-nav{
            justify-content: center;
            align-items: center;
        }
        
        .navbar-nav .nav-link {
            font-size: 18px;
            margin-right: 15px;
        }

        /* Parallax Banner */
        .banner {
            background-image: url("images/banner-home.jpg"); /* Replace with your image */
            background-size: cover;
            background-position: center;
            height: 800px;
            color: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            background-attachment: fixed; /* Parallax effect */
        }

        .banner h1 {
            font-size: 70px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
            animation: fadeInDown 2s;
        }

        /* Fade-in animation */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* About Section */

        .about {
            padding: 100px 0;
            background-color: #f4f4f9;
            text-align: center;
            height: 100vh;
        }

        .about h2 {
            font-weight: 700;
            font-size: 36px;
            margin-bottom: 30px;
            text-transform: uppercase;
            color: #333;
        }

        .about .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .about .col-md-4 {
            margin-bottom: 30px;
        }

        .about h4 {
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 15px;
            color: #333;
        }

        .about p {
            font-size: 16px;
            color: #666;
            line-height: 1.7;
        }

        .about .icon-box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .about .icon-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .about .icon-box .icon {
            font-size: 50px;
            color: #ffc107;
            margin-bottom: 20px;
        }

        /* Fade-in animation */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Contact Section */
        .contact {
            padding: 100px 0;
            background: linear-gradient(to right, #f9f9f9, #e3e3e3);
            text-align: center;
        }

        .contact h2 {
            font-weight: 700;
            font-size: 36px;
            margin-bottom: 30px;
            color: #333;
            position: relative;
            display: inline-block;
        }

        .contact h2::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            width: 60px;
            height: 3px;
            background: #ffc107;
            transform: translateX(-50%);
        }

        .contact .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contact .col-md-6 {
            padding: 15px;
        }

        .contact .form-group {
            margin-bottom: 20px;
        }

        .contact .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 15px;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }

        .contact .form-control:focus {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            border-color: #ffc107;
            outline: none;
        }

        .contact .btn-primary {
            background: #ffc107;
            border: none;
            color: #fff;
            padding: 15px 25px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .contact .btn-primary:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }

        .contact .btn-primary:active {
            transform: translateY(0);
        }

        .contact h4 {
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        .contact p {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact .fas {
            font-size: 20px;
            color: #ffc107;
            margin-right: 15px;
        }

        .contact a {
            color: #ffc107;
            text-decoration: none;
        }

        .contact a:hover {
            color: #e0a800;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .contact .col-md-6 {
                padding: 10px;
            }
        }


        /* Skills Section */
        .skills {
            padding: 100px 0;
            background-color: #dae4f5;
            text-align: center;
            height: 100vh;
        }

        .skills h2 {
            font-weight: 700;
            font-size: 36px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .skills .skill-item {
            margin-bottom: 30px;
        }

        .skills .skill-icon {
            font-size: 50px;
            color: #ffc107;
        }

        .skills h4 {
            font-weight: 500;
            margin-top: 15px;
            font-size: 24px;
        }

        .skills p {
            font-size: 16px;
            color: #666;
        }

        /* Image Gallery */
        /* Enhanced Image Gallery */
        .gallery {
            padding: 100px 0;
            background-color: #F1DFF2;
        }

        .gallery h2 {
            font-weight: 700;
            font-size: 36px;
            margin-bottom: 40px;
            text-transform: uppercase;
            color: #333;
            text-align: center;
        }

        .gallery .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .gallery img {
            width: 100%;
            height: 50vh;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            object-fit: cover;
        }

        .gallery img:hover {
            transform: scale(1.15);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        /* Responsive Grid */
        @media (max-width: 768px) {
            .gallery .grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }


        /* Footer */
        footer {
            background-color: #DDF1ED;
            color: #CA8BE3;
            padding: 40px 0;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 16px;
        }

        footer a {
            color: #3C4442;
        }

        footer a:hover {
            color: #adb5bd;
        }

        /* Smooth scroll for anchor links */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Jewelry Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#skills">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Registration</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Banner Section -->
    <div id="home" class="banner">
        <div class="container">
            <h1>Elegant Jewelry Management</h1>
        </div>
    </div>


    <!-- About Section -->
    <section id="about" class="about">
    <div class="container">
            <h2>About Us</h2>
            <p>Our Jewelry Management System is designed to provide a seamless experience for jewelers and businesses of all sizes. From tracking inventory and sales to managing customer data, our platform helps you efficiently run your jewelry store or business.</p>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4>Secure Data Management</h4>
                        <p>With robust security features, your business and customer data are protected from unauthorized access. Our system uses encryption and secure login protocols to ensure your information stays safe.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4>Easy-to-Use Interface</h4>
                        <p>Our platform is designed for ease of use, allowing you and your team to manage your store with minimal training. The intuitive interface lets you access all essential features with just a few clicks.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h4>Customizable Features</h4>
                        <p>We understand that every business is unique. That's why our Jewelry Management System is customizable to meet your specific needs. Whether you're a small boutique or a large chain, we have the tools you need to succeed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Owner Skills Section -->
    <section id="skills" class="skills">
        <div class="container">
            <h2>Owner's Skills</h2>
            <div class="row mt-5">
                <div class="col-md-4 skill-item">
                    <div class="skill-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h4>Jewelry Expertise</h4>
                    <p>With years of experience in the jewelry industry, the owner possesses expert knowledge of gemstones, precious metals, and craftsmanship.</p>
                </div>
                <div class="col-md-4 skill-item">
                    <div class="skill-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Business Management</h4>
                    <p>Proven skills in managing inventory, handling sales, and optimizing business operations to ensure smooth and profitable performance.</p>
                </div>
                <div class="col-md-4 skill-item">
                    <div class="skill-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Customer Relations</h4>
                    <p>Strong focus on building customer trust and relationships, ensuring each client receives personalized attention and exceptional service.</p>
                </div>
            </div>
        </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="skill-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <h4>Comprehensive Inventory Management</h4>
                        <p>Keep track of every piece in your collection, from rings to necklaces, with real-time inventory updates. Our system ensures you always know what’s in stock, what’s selling fast, and when to reorder.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="skill-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Customer Relationship Management</h4>
                        <p>Build strong relationships with your customers by maintaining a detailed database of their preferences, purchase history, and important dates like anniversaries or birthdays. Personalize their experience and keep them coming back.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="skill-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Detailed Sales Reporting</h4>
                        <p>Our system offers advanced analytics and reporting tools, providing insights into your business performance. Track sales trends, customer behavior, and profitability with easy-to-read reports that help you make informed decisions.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Image Gallery Section -->
    <section id="gallery" class="gallery">
        <div class="container">
            <h2>Our Collection</h2>
            <div class="grid">
                <img src="images/m1.png" alt="Ring">
                <img src="images/m2.png" alt="Necklace">
                <img src="images/m3.png" alt="Bracelet">
                <img src="images/m4.png" alt="Ring">
                <img src="images/m5.png" alt="Necklace">
                <img src="images/m6.png" alt="Bracelet">
                <img src="images/m7.png" alt="Ring">
                <img src="images/m8.png" alt="Necklace">
                <img src="images/m9.png" alt="Bracelet">
                <img src="images/m10.png" alt="Ring">
                <img src="images/m11.png" alt="Necklace">
                <img src="images/m12.png" alt="Bracelet">
                <img src="images/m13.png" alt="Ring">
                <img src="images/m14.png" alt="Necklace">
                <img src="images/m15.png" alt="Bracelet">
                <img src="images/m16.png" alt="Ring">
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Get in Touch</h4>
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Our Office</h4>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Jewelry Lane, Bardoli City, CA 12345</p>
                    <p><i class="fas fa-phone"></i> +91 8320836870</p>
                    <p><i class="fas fa-envelope"></i> <a href="mailto:22bca29@vtcbcsr.edu.in">22bca29@vtcbcsr.edu.in</a></p>
                    <p><i class="fas fa-clock"></i> Mon-Fri: 9am - 6pm | Sat: 10am - 4pm</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Jewelry Management System. All Rights Reserved.</p>
            <p><a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></p>
        </div>        
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs"></script>
</body>
</html>