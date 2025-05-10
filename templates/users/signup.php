<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>
<?php include __DIR__ . '/../partials/navbar.php'; ?>
<div class="auth-container">
    <div class="auth-form">
        <h1>Create an Account</h1>
        <p>Join PhotoGallery to start uploading and sharing your photos.</p>

        <?php if (!empty($success)):?>
            <div class="success-message">
                <p>Account created successfully! <a href="/login">Log in now</a> to get started.</p>
            </div>
        <?php else: ?>

            <?php if (!empty($errors['general'])): ?>
                <div class="error-message">
                    <p><?php echo htmlspecialchars($errors['general'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            <?php endif; ?>

            <form action="/signup" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo !empty($formData['username']) ? htmlspecialchars($formData['username'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                    <?php if (!empty($errors['username'])): ?>
                        <span class="error"><?php echo htmlspecialchars($errors['username'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo !empty($formData['email']) ? htmlspecialchars($formData['email'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                    <?php if (!empty($errors['email'])): ?>
                        <span class="error"><?php echo htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <?php if (!empty($errors['password'])): ?>
                        <span class="error"><?php echo htmlspecialchars($errors['password'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <?php if (!empty($errors['confirm_password'])): ?>
                        <span class="error"><?php echo htmlspecialchars($errors['confirm_password'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-full">Sign Up</button>
                </div>
            </form>

            <div class="auth-links">
                <p>Already have an account? <a href="/login">Log In</a></p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>