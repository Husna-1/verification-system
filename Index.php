<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodaboda & Bajaji Verification System</title>
    <link rel="stylesheet" href="Assets.css">
    <style>
       .hero {
            background-image: url('./image/road.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            height: 100vh;
        }

    </style>
</head>
<body>
    <div class="hero">
        <div class="overlay"></div>
        <div class="content">
            <h1>Welcome to Bodaboda & Bajaji Verification System</h1>
            <p>Verify registered and certified drivers easily and securely</p>
            <div class="buttons">
                <a href="auth/login.php" class="btn primary-btn">Login</a>
                <a href="auth/register.php" class="btn secondary-btn">Register</a>
            </div>
        </div>
    </div>
</body>
</html> -->



<!-- ====================================================================================================================== -->


<?php
// Start session if needed for authentication
session_start();

// Configuration
$systemName = "Zanzibar BodaBoda/Bajaji Verification";
$welcomeMessage = "Digital Verification System for Transport Operators";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($systemName); ?></title>
    <style>
        /* Modern CSS Reset */
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #27ae60;
            --warning: #f39c12;
            --font-main: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: var(--dark);
            background-color: #f5f7fa;
        }
        
        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 100;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logo img {
            height: 50px;
            width: auto;
        }
        
        .logo-text h1 {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .logo-text p {
            font-size: 0.8rem;
            opacity: 0.9;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            position: relative;
        }
        
        nav a:hover {
            opacity: 0.8;
        }
        
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: white;
            transition: width 0.3s ease;
        }
        
        nav a:hover::after {
            width: 100%;
        }
        
        /* Hero Section */
        .hero {
            background: url('../image/bycle.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            align-items: center;
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 2;
            color: white;
        }
        
        .hero-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: var(--accent);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid white;
            margin-left: 1rem;
        }
        
        .btn-outline:hover {
            background-color: white;
            color: var(--primary);
        }
        
        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 2rem;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .feature-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }
        
        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        
        /* Verification Section */
        .verification-section {
            background-color: var(--primary);
            color: white;
            padding: 3rem 2rem;
            border-radius: 8px;
            margin: 3rem 0;
            text-align: center;
        }
        
        .verification-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .verification-form {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 4px;
            font-family: var(--font-main);
        }
        
        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin: 3rem 0;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 3rem 2rem;
            margin-top: 3rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .footer-col h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
        }
        
        .footer-col ul {
            list-style: none;
        }
        
        .footer-col li {
            margin-bottom: 0.8rem;
        }
        
        .footer-col a {
            color: #ddd;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-col a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                gap: 1rem;
            }
            
            .hero-content h2 {
                font-size: 2rem;
            }
            
            .btn {
                display: block;
                width: 100%;
                margin-bottom: 1rem;
            }
            
            .btn-outline {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <!-- Replace with your actual logo -->
                <img src="https://via.placeholder.com/50x50" alt="System Logo">
                <div class="logo-text">
                    <h1><?php echo htmlspecialchars($systemName); ?></h1>
                    <p>Government of Zanzibar</p>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="./users/users.php">Verification</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                    <?php else: ?>
                        <li><a href="../login/login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="hero">
        <div class="hero-content">
            <h2>Digital Verification System for BodaBoda & Bajaji Operators</h2>
            <p><?php echo htmlspecialchars($welcomeMessage); ?></p>
            <div class="hero-buttons">
                <a href="verify.php" class="btn">Verify Operator</a>
                <a href="register.php" class="btn btn-outline">Register Vehicle</a>
            </div>
        </div>
    </section>
    
    <main class="container">
        <section class="features">
            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Quick Verification</h3>
                <p>Verify any BodaBoda or Bajaji operator in seconds using their registration number or QR code.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Mobile Friendly</h3>
                <p>Access the verification system from any smartphone or tablet while on the move.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Secure Database</h3>
                <p>All operator data is securely stored and only accessible to authorized personnel.</p>
            </div>
        </section>
        
        <section class="verification-section">
            <h2>Verify an Operator Now</h2>
            <form action="verify.php" method="POST" class="verification-form">
                <div class="form-group">
                    <label for="reg-number">Registration Number</label>
                    <input type="text" id="reg-number" name="reg_number" class="form-control" placeholder="Enter vehicle registration number" required>
                </div>
                <button type="submit" class="btn">Verify Now</button>
                <p style="margin-top: 1rem;">or scan QR code with your mobile device</p>
            </form>
        </section>
        
        <section class="stats">
            <div class="stat-card">
                <div class="stat-number">12,345</div>
                <p>Registered BodaBodas</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">8,765</div>
                <p>Registered Bajajis</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">98%</div>
                <p>Verification Accuracy</p>
            </div>
            <div class="stat-card">
                <div class="stat-number">24/7</div>
                <p>System Availability</p>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h3>About Us</h3>
                <p>The Zanzibar BodaBoda/Bajaji Verification System ensures all transport operators are properly registered and verified for public safety.</p>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Verification</a></li>
                    <li><a href="#">Registration</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contact</h3>
                <ul>
                    <li>Ministry of Transport</li>
                    <li>Zanzibar, Tanzania</li>
                    <li>Email: info@bodaboda-zanzibar.go.tz</li>
                    <li>Phone: +255 24 223 3444</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> Zanzibar BodaBoda/Bajaji Verification System. All rights reserved.
        </div>
    </footer>
</body>
</html>