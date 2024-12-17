<?php
// Fetch the RSS feed
$rssUrl = "https://rss.app/feeds/v1.1/_XwwiGIQsUmb6Z8hc.json";
$json = file_get_contents($rssUrl);

// Check if the feed is accessible
if (!$json) {
    die("Failed to fetch RSS feed.");
}

$data = json_decode($json, true);

// Debug: Check if the data is valid
if (!isset($data['items'])) {
    die("Invalid RSS feed format.");
}

// Get the article ID from the URL
$id = $_GET['id'] ?? null;
if (!$id) {
    die("No article ID provided.");
}

// Find the article by ID
$article = null;
foreach ($data['items'] as $item) {
    if ($item['id'] === $id) {
        $article = $item;
        break;
    }
}

// If no article is found, show an error
if (!$article) {
    die("Article not found.");
}
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
    <header>
        <nav>
            <div class="logo"><a href="index.php">World News</a></div>
        </nav>
    </header>

    <main class="news-detail-container">
        <article class="news-detail">
            <h1 class="news-detail-title"><?php echo htmlspecialchars($article['title']); ?></h1>
            <p class="news-meta">
                Published on: <?php echo date('F j, Y', strtotime($article['date_published'])); ?>
            </p>
            <?php if (!empty($article['image'])): ?>
                <div class="news-detail-image">
                    <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                </div>
            <?php endif; ?>
            <div class="news-detail-content">
                <p><?php echo nl2br(htmlspecialchars($article['content_text'] ?? 'No content available.')); ?></p>
            </div>
        </article>
    </main>

    <footer>
        <div class="footer-content">
            &copy; <?php echo date('Y'); ?> World News. All Rights Reserved.
        </div>
    </footer>
</body>
</html>