<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/BigProjects/Fullstack3Month/assets/css/style.css">
    <link rel="stylesheet" href="/BigProjects/Fullstack3Month/assets/css/auth.css">
</head>
<body>
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<div class="auth-container">
    <div class="auth-form">
        <h1>Welcome Back</h1>
        <p>Log in to your PhotoGallery account to continue.</p>

        <?php if (!empty($errors['general'])): ?>        <div class="error-message">
            <p>{{ errors.general }}</p>
        </div>
        <?php endif; ?>

        <form action="/login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
                <a href="/forgot-password" class="forgot-link">Forgot password?</a>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-full">Log In</button>
            </div>
        </form>

        <div class="auth-links">
            <p>Don't have an account? <a href="/signup">Sign Up</a></p>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>