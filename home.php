<?php
$featured_posts = [
    [
        'title' => 'The Road Ahead',
        'subtitle' => 'The road ahead might be paved - it might not be.',
        'img_modifier' => './static/image/the-road-ahead.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'style' => 'featured-post post_the-road-ahead',
        'url' => './post.php',
        'date' => '1442307600',
    ],
    [
        'title' => 'From Top Down',
        'subtitle' => 'Once a year, go someplace you’ve never been before.',
        'img_modifier' => './static/image/from-top-down.png',
        'img_author' => './static/image/authors/William_Wong.svg',
        'author' => 'William Wong',
        'style' => 'featured-post post_from-top-down',
        'url' => './home.php',
        'date' => '1442307600',
    ]    
];
$most_recent_post = [
    [
        'title' => 'Still Standing Tall',
        'subtitle' => 'Life begins at the end of your comfort zone.',
        'img_modifier' => './static/image/still-standing-tall.jpg',
        'img_author' => './static/image/authors/William_Wong.svg',
        'author' => 'William Wong',
        'date' => '1443171600',
    ],
    [
        'title' => 'Sunny Side Up',
        'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
        'img_modifier' => './static/image/sunny-side-up.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => '1443171600',
    ],
    [
        'title' => 'Water Falls',
        'subtitle' => 'We travel not to escape life, but for life not to escape us.',
        'img_modifier' => './static/image/water-falls.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => '1443171600',
    ],
    [
        'title' => 'Through the Mist',
        'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
        'img_modifier' => './static/image/through-the-mist.png',
        'img_author' => './static/image/authors/William_Wong.svg',
        'author' => 'William Wong',
        'date' => '1443171600',
    ],
    [
        'title' => 'Awaken Early',
        'subtitle' => 'Not all those who wander are lost.',
        'img_modifier' => './static/image/awaken-early.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => '1443171600',
    ],
    [
        'title' => 'Try it Always',
        'subtitle' => 'The world is a book, and those who do not travel read only one page.',
        'img_modifier' => './static/image/try-it-always.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => '1443171600',
    ]
];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://4ntonyuk.github.io/styles/reset.css">
    <link rel="stylesheet" href="./static/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">

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
            <h1 class="title__main-title">Let's do it together.</h1>
            <h2 class="title__subtitle">We travel the world in search of stories. Come along for the ride.</h2>
            <a href="" class="title__latest-posts">View Latest Posts</a>
        </div>
    </header>
    <div class="main-panel">
        <a href="" class="main-panel__link">Nature</a>
        <a href="" class="main-panel__link">Photography</a>
        <a href="" class="main-panel__link">Relaxations</a>
        <a href="" class="main-panel__link">Vacation</a>
        <a href="" class="main-panel__link">Travel</a>
        <a href="" class="main-panel__link">Adventure</a>
    </div>
    <main class="main-content">
        <div class="featured-posts">
            <h2 class="featured__title">Featured Posts</h2>
            <div class="featured-posts__posts">
                <?php
                foreach ($featured_posts as $featured_post) {
                    include './preview/featured-post_preview.php';
                }
                ?>
            </div>
        </div>
        <div class="most-recent">
            <h2 class="most-recent__title">Most Recent</h2>
            <div class="most-recent__posts">
                <?php
                foreach ($most_recent_post as $most_recent) {
                    include './preview/most-recent_preview.php';
                }      
                ?>
            </div>
        </div>
    </main>
    <footer class="footer__panel">
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