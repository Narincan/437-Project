<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php'; // Database connection

// Step 1: Get the article ID from the URL
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("Invalid or missing article ID.");
}

// Step 2: Fetch the article from the database
$query = "SELECT * FROM news_articles WHERE id = $id AND is_deleted = 0";
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if (!$result) {
    die("Error fetching article: " . mysqli_error($conn));
}

// Step 3: Check if the article exists
if (mysqli_num_rows($result) == 0) {
    die("Article not found.");
}

$article = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title'] ?? 'News Detail'); ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo"><a href="index.php">World News</a></div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="news-detail-container">
        <article class="news-detail">
            <h1 class="news-detail-title"><?php echo htmlspecialchars($article['title']); ?></h1>
            <p class="news-meta">
                Published on: <?php echo date('F j, Y', strtotime($article['date_published'])); ?>
            </p>
            <?php if (!empty($article['image_url'])): ?>
                <div class="news-detail-image">
                    <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                </div>
            <?php endif; ?>
            <div class="news-detail-content">
                <p><?php echo nl2br(htmlspecialchars($article['content_text'] ?? 'No content available.')); ?></p>
            </div>
        </article>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            &copy; <?php echo date('Y'); ?> World News. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
