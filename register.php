<?php
$siteName = "Global News Network";
$currentYear = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - <?php echo $siteName; ?></title>
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

    <!-- Registration Form -->
    <div class="registration-container">
        <h2>Create an Account</h2>
        <form class="registration-form" action="login.php">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo $currentYear; ?> <?php echo $siteName; ?>. All rights reserved.</p>
    </footer>
</body>
</html>