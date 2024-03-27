<?php
$Home = [
    'title' => 'Let’s do it together.',
    'subtitle' => 'We travel the world in search of stories. Come along for the ride.',
    'featured_title' => 'Featured Posts',
    'most-recent_title' => 'Most Recent',
];
$FeaturedPost = [
    [
        'id' => '1',
        'modifier' => 'none',
        'title' => 'The Road Ahead',
        'subtitle' => 'The road ahead might be paved - it might not be.',
        'img' => './static/image/the-road-ahead.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => 1443171600,
    ],
    [
        'id' => '2',
        'modifier' => 'adventure',
        'title' => 'From Top Down',
        'subtitle' => 'Once a year, go someplace you’ve never been before.',
        'img' => './static/image/from-top-down.png',
        'img_author' => './static/image/authors/William_Wong.svg',
        'author' => 'William Wong',
        'date' => 1443171600,
    ]    
];
$MostRecentPost = [
    [
        'id' => '1',
        'modifier' => 'none',
        'title' => 'Still Standing Tall',
        'subtitle' => 'Life begins at the end of your comfort zone.',
        'img' => './static/image/still-standing-tall.jpg',
        'img_author' => './static/image/authors/William_Wong.svg',
        'author' => 'William Wong',
        'date' => 1443171600,
    ],
    [
        'id' => 2,
        'modifier' => 'none',
        'title' => 'Sunny Side Up',
        'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
        'img' => './static/image/sunny-side-up.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => 1443171600,
    ],
    [
        'id' => '3',
        'modifier' => 'none',
        'title' => 'Water Falls',
        'subtitle' => 'We travel not to escape life, but for life not to escape us.',
        'img' => './static/image/water-falls.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => 1443171600,
    ],
    [
        'id' => '4',
        'modifier' => 'none',
        'title' => 'Through the Mist',
        'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
        'img' => '/static/image/through-the-mist.png',
        'img_author' => './static/image/authors/William_Wong.svg',
        'author' => 'William Wong',
        'date' => 1443171600,
    ],
    [
        'id' => '5',
        'modifier' => 'none',
        'title' => 'Awaken Early',
        'subtitle' => 'Not all those who wander are lost.',
        'img' => './static/image/awaken-early.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => 1443171600,
    ],
    [
        'id' => '6',
        'modifier' => 'none',
        'title' => 'Try it Always',
        'subtitle' => 'The world is a book, and those who do not travel read only one page.',
        'img' => './static/image/try-it-always.png',
        'img_author' => './static/image/authors/Mat_Vogels.svg',
        'author' => 'Mat Vogels',
        'date' => 1443171600,
    ]
];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://4ntonyuk.github.io/styles/reset.css">
    <link rel="stylesheet" href="https://localhost/static/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">

    <title>Home</title>
</head>

<body>
    <header class="head">
        <div class="head__panel">
            <a href="" class="panel__logo">
                <img src="https://localhost/static/image/escape.svg" alt="Escape">
            </a>
            <nav class="panel__navigation">
                <a href="" class="navigation__link">HOME</a>
                <a href="" class="navigation__link">CATEGORIES</a>
                <a href="" class="navigation__link">ABOUT</a>
                <a href="" class="navigation__link">CONTACT</a>
            </nav>
        </div>
        <div class="head__title">
            <h1 class="title__main-title"><?= $Home['title']?></h1>
            <h2 class="title__subtitle"><?= $Home['subtitle']?></h2>
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
            <h2 class="featured__title"><?= $Home['featured_title']?></h2>
            <div class="featured-posts__posts">
                <?php
                foreach ($FeaturedPost as $FeaturedPostContent) {
                    include './preview/featured-post_preview.php';
                }
                ?>
            </div>
        </div>
        <div class="most-recent">
            <h2 class="most-recent__title"><?= $Home['most-recent_title']?></h2>
            <div class="most-recent__posts">
                <?php
                foreach ($MostRecentPost as $MostRecentContent) {
                    include './preview/most-recent_preview.php';
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