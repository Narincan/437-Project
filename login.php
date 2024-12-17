<?php
$siteName = "Global News Network";
$currentYear = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo $siteName; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="../index.php"><?php echo $siteName; ?></a>
            </div>
        </nav>
    </header>

    <!-- Login Form -->
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="index.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo $currentYear; ?> <?php echo $siteName; ?>. All rights reserved.</p>
    </footer>
</body>
</html>