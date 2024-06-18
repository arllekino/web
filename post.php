<?php
require_once './DBConnection.php';

$postId = $_GET['id'];


$conn = createDBConnection();
$sql = "SELECT post_id, title, subtitle, content, post_image_url FROM post WHERE post_id = $postId";

$result = $conn->query($sql);

$post = mysqli_fetch_assoc($result);
if (!$post) {
    die('Данные некорректны');
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['title']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/style/post.css">
</head>

<body>
    <header class="head">
        <div class="panel">
            <a href="home" class="panel__link">
                <img src="./static/image/escape_black.svg" alt="Escape" class="panel__logo">
            </a>
            <nav class="panel__navigation">
                <a href="" class="navigation__link">HOME</a>
                <a href="" class="navigation__link">CATEGORIES</a>
                <a href="" class="navigation__link">ABOUT</a>
                <a href="" class="navigation__link">CONTACT</a>
            </nav>
        </div>
        <h1 class="main-title">
            <?= $post['title']; ?>
        </h1>
        <h2 class="subtitle">
            <?= $post['subtitle'] ?>
        </h2>


    </header>
    <img src="<?= $post['post_image_url'] ?>" alt="Photo" class="main-photo">
    <main class="text">
        <?= $post['content'] ?>
    </main>
    <footer class="panel bottom-panel">
        <img src="./static/image/escape.svg" alt="Escape" class="panel__logo">
        <nav class="panel__navigation">
            <a href="" class="navigation__link navigatoin__link_dark">HOME</a>
            <a href="" class="navigation__link navigatoin__link_dark">CATEGORIES</a>
            <a href="" class="navigation__link navigatoin__link_dark">ABOUT</a>
            <a href="" class="navigation__link navigatoin__link_dark">CONTACT</a>
        </nav>
    </footer>
</body>


</html>

<?php closeDBConnection($conn) ?>