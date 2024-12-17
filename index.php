<?php
// Fetch RSS Feed
$rssUrl = "https://rss.app/feeds/v1.1/_XwwiGIQsUmb6Z8hc.json";
$response = file_get_contents($rssUrl);
$articles = json_decode($response, true)['items'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World News</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="index.php">World News</a></div>
            <div class="auth-links">
                <a href="login.php" class="login-btn">Login</a>
                <a href="register.php" class="register-btn">Register</a>
            </div>
        </nav>
    </header>

    <main>
        <h1 class="page-title">Latest News</h1>
        <div class="news-grid">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <div class="news-card">
                        <div class="news-content">
                            <h2 class="news-title">
                                <a href="news-detail.php?id=<?php echo urlencode($article['id']); ?>">
                                    <?php echo htmlspecialchars($article['title']); ?>
                                </a>
                            </h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No articles available at the moment. Please check back later.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            &copy; <?php echo date('Y'); ?> World News. All Rights Reserved.
        </div>
    </footer>
</body>
</html>