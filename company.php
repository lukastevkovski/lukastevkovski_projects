<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/Website.php';

$database = new Database();
$db = $database->getConnection();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$data = Website::read($db, $id);

if (!$data) {
    die("No data found for ID: " . htmlspecialchars($id));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($data['main_title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="company-page">
    <!-- Navbar -->
    <nav>
        <div class="logo">Webster</div>
        <ul class="nav-links">
            <li><a href="#home" class="nav-item">Home</a></li>
            <li><a href="#about" class="nav-item">About Us</a></li>
            <li><a href="#services" class="nav-item">Services</a></li>
            <li><a href="#contact" class="nav-item">Contact</a></li>
        </ul>
    </nav>

    <!-- Home Section -->
    <section id="home" class="section hero">
        <img src="<?php echo htmlspecialchars($data['cover_image_url']); ?>" alt="Cover Image" class="cover-image">
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($data['main_title']); ?></h1>
            <p class="subtitle"><?php echo htmlspecialchars($data['subtitle']); ?></p>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="section about">
        <h2>About Us</h2>
        <p><?php echo htmlspecialchars($data['about']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($data['location']); ?></p>
        <p><strong>Tel:</strong> <?php echo htmlspecialchars($data['phone']); ?></p>
    </section>

    <!-- Services Section -->
    <section id="services" class="section services">
        <h2>Services</h2>
        <div class="cards-container">
            <div class="card">
                <img src="<?php echo htmlspecialchars($data['service1_image_url']); ?>" alt="Service 1">
                <h3>Service One Description</h3>
                <p><?php echo htmlspecialchars($data['service1_description']); ?></p>
                <p class="last-updated">Last updated 3 mins ago</p>
            </div>
            <div class="card">
                <img src="<?php echo htmlspecialchars($data['service2_image_url']); ?>" alt="Service 2">
                <h3>Service Two Description</h3>
                <p><?php echo htmlspecialchars($data['service2_description']); ?></p>
                <p class="last-updated">Last updated 3 mins ago</p>
            </div>
            <div class="card">
                <img src="<?php echo htmlspecialchars($data['service3_image_url']); ?>" alt="Service 3">
                <h3>Service Three Description</h3>
                <p><?php echo htmlspecialchars($data['service3_description']); ?></p>
                <p class="last-updated">Last updated 3 mins ago</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact">
        <h2>Contact</h2>
        <p class="company-description"><?php echo htmlspecialchars($data['company_description']); ?></p>
        <form class="contact-form">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>Copyright by Stefan © Brainster</p>
        <div class="social-links">
            <a href="<?php echo htmlspecialchars($data['linkedin_url']); ?>" target="_blank">LinkedIn</a>
            <a href="<?php echo htmlspecialchars($data['facebook_url']); ?>" target="_blank">Facebook</a>
            <a href="<?php echo htmlspecialchars($data['twitter_url']); ?>" target="_blank">Twitter</a>
            <a href="<?php echo htmlspecialchars($data['google_url']); ?>" target="_blank">Google+</a>
        </div>
    </footer>
</body>
</html>