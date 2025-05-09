<?php if (empty($_SESSION['auth'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/landing.css">
</head>
<body>
<?php include __DIR__ . '../partials/navbar.php'; ?>

<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title">Create & Share Beautiful Vano Collections</h1>
        <p class="hero-text">Join thousands of photographers who trust PhotoGallery to store, organize, and showcase their most precious moments in stunning galleries.</p>
        <div class="cta-buttons">
            <a href="/BigProjects/Fullstack3Month/signup" class="btn btn-primary">Sign Up Free</a>
            <a href="/BigProjects/Fullstack3Month/login" class="btn btn-secondary">Log In</a>
        </div>
        <p>No credit card requiredd • Free plan available</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Why Choose PhotoGallery</h2>
        <div class="features">
            <div class="feature">
                <i class="fas fa-cloud-upload-alt feature-icon"></i>
                <h3>Easy Uploading</h3>
                <p>Upload hundreds of photos at once with our simple drag-and-drop interface. Organize them into albums with just a few clicks.</p>
            </div>
            <div class="feature">
                <i class="fas fa-shield-alt feature-icon"></i>
                <h3>Secure Storage</h3>
                <p>Your precious memories are secured with enterprise-grade encryption and redundant backups. Never lose a photo again.</p>
            </div>
            <div class="feature">
                <i class="fas fa-share-alt feature-icon"></i>
                <h3>Beautiful Sharing</h3>
                <p>Create stunning galleries to share with friends and family. Control who sees what with flexible privacy settings.</p>
            </div>
        </div>
    </div>
</section>

<section class="section testimonials">
    <div class="container">
        <h2 class="section-title">What Our Users Say</h2>
        <div class="testimonial">
            <p class="testimonial-text">"PhotoGallery has completely transformed how I share my photography work with clients. The interface is intuitive and the galleries look absolutely stunning."</p>
            <p class="testimonial-author">— Michael R., Professional Photographer</p>
        </div>
        <div class="testimonial">
            <p class="testimonial-text">"I've tried dozens of photo gallery services and none compare to the ease of use and beautiful presentation of PhotoGallery. It's perfect for sharing family memories."</p>
            <p class="testimonial-author">— Sarah T., Family Photographer</p>
        </div>
    </div>
</section>

<section class="section text-center">
    <div class="container">
        <h2 class="section-title">Ready to Get Started?</h2>
        <p class="cta-section-text">Join thousands of photographers who trust PhotoGallery to store and showcase their precious memories.</p>
        <a href="/BigProjects/Fullstack3Month/signup" class="btn btn-primary cta-button-large">Create Free Account</a>
    </div>
</section>

<?php include __DIR__ . '../partials/footer.php'; ?>
</body>
</html>
<?php else: ?>
    <div class="container mt-5">
        login success
    </div>
<?php endif; ?>