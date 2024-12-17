<?php
$adminName = "John Doe";
$currentYear = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Global News Network</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="admin-header">
            <nav>
                <span class="admin-user">Admin: <?php echo $adminName; ?></span>
                <a href="logout.php" class="logout-btn">Logout</a>
            </nav>
        </div>
    </header>

    <main>
        <h2>Welcome, <?php echo $adminName; ?></h2>
    </main>
</body>
</html>