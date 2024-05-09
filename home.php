<?php
require_once './DBConnection';
$conn = createDBConnection();
$sql = "SELECT post_id, featured, modifier, title, subtitle, img_url, author, img_author_url, publish_date FROM post";
$result = $conn->query($sql);
closeDBConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./static/style/reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/style/home.css">
    
    <title>Home</title>
</head>

<body>
    <header class="head">
        <div class="head__panel">
            <a href="" class="panel__logo">
                <img src="./static/image/escape.svg" alt="Escape">
            </a>
            <nav class="panel__navigation">
                <a href="" class="navigation__link">HOME</a>
                <a href="" class="navigation__link">CATEGORIES</a>
                <a href="" class="navigation__link">ABOUT</a>
                <a href="" class="navigation__link">CONTACT</a>
            </nav>
        </div>
        <div class="head__title">
            <h1 class="title__main-title">
                Let’s do it together.
            </h1>
            <h2 class="title__subtitle">
                We travel the world in search of stories. Come along for the ride.
            </h2>
            <button class="title__latest-posts">View Latest Posts</button>
        </div>
    </header>
    <nav class="main-panel">
        <a href="" class="main-panel__link">Nature</a>
        <a href="" class="main-panel__link">Photography</a>
        <a href="" class="main-panel__link">Relaxations</a>
        <a href="" class="main-panel__link">Vacation</a>
        <a href="" class="main-panel__link">Travel</a>
        <a href="" class="main-panel__link">Adventure</a>
    </nav>
    <main class="main-content">
        <div class="featured-posts">
            <h2 class="featured__title">
                Featured Posts
            </h2>
            <div class="featured-posts__posts">
                <?php
                foreach ($result as $featuredPostContent) {
                    if ($featuredPostContent['featured'] == 1) {
                        include './preview/featured-post_preview.php';
                    }
                }
                
                ?>
            </div>
        </div>
        <div class="most-recent">
            <h2 class="most-recent__title">
                Most Recent
            </h2>
            <div class="most-recent__posts">
                <?php
                foreach ($result as $mostRecentContent) {
                    if ($mostRecentContent['featured'] == 0) {
                        include './preview/most-recent_preview.php';
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <footer class="footer-panel">
        <img src="./static/image/escape.svg" alt="Escape" class="logo_footer">
        <nav class="panel__navigation">
            <a href="" class="navigation__link link_dark">HOME</a>
            <a href="" class="navigation__link link_dark">CATEGORIES</a>
            <a href="" class="navigation__link link_dark">ABOUT</a>
            <a href="" class="navigation__link link_dark">CONTACT</a>
        </nav>
    </footer>
</body>

</html>