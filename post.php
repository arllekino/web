<?php
require_once './DBConnection';

$postId = $_GET["id"];


$conn = createDBConnection();
$sql = "SELECT post_id, title, subtitle, content, img_url FROM post WHERE post_id = $postId";

$result = $conn->query($sql);

$post = mysqli_fetch_assoc($result);
if (!$post) 
{
    die ('Данные некорректны');
} 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Road Ahead</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/style/the-road-ahead.css">
</head>

<body>
    <header class="head">
        <div class="panel">
            <a href="home" class="logo">
                <img src="./static/image/escape_black.svg" alt="escape">
            </a>
            <div class="buttons">
                <a href="./home" class="link-up">HOME</a>
                <a href="" class="link-up">CATEGORIES</a>
                <a href="" class="link-up">ABOUT</a>
                <a href="" class="link-up">CONTACT</a>
            </div>
        </div>
        <h1 class="main-title">
            <?= $post['title']; ?>
        </h1>
        <h2 class="subtitle">
            <?= $post['subtitle'] ?>
        </h2>


    </header>
    <img src="<?= $post['img_url'] ?>" alt="Photo" class="main-photo">
    <main class="text">
        <?= $post['content'] ?>
    </main>
    <footer class="bottom-panel">
        <img src="./static/image/escape.svg" alt="escape" class="bottom-escape">
        <div class="bottom-navigation">
            <a href="" class="link-down">HOME</a>
            <a href="" class="link-down">CATEGORIES</a>
            <a href="" class="link-down">ABOUT</a>
            <a href="" class="link-down">CONTACT</a>
        </div>
    </footer>
</body>


</html>

<?php closeDBConnection($conn) ?>