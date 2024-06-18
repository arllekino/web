<?php

require_once __DIR__ . '/../DBConnection.php';
$conn = createDBConnection();
function saveFile(string $file, string $data): void
{
    $myFile = fopen($file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
        if ($result) {
            echo 'Данные успешно сохранены в файл';
        } else {
            echo 'Произошла ошибка при сохранении данных в файл';
        }
        fclose($myFile);
    } else {
        echo 'Произошла ошибка при открытии файла';
    }
}
function saveImage(string $imageBase64, string $namePhoto, ?string &$urlImage)
{
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    $namePhoto = str_replace([' '], ['_'], $namePhoto);
    saveFile(__DIR__ . "/../static/image/{$namePhoto}.{$imgExtention}", $imageDecoded);
    $urlImage = "/static/image/{$namePhoto}.{$imgExtention}";
}

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method === 'POST') {
    $dataAsJson = file_get_contents('php://input');
    $dataAsArray = json_decode($dataAsJson, true);

    if ($dataAsArray['post_image']) {
        $postImageName = 'post_image_' . $dataAsArray['title'];
        saveImage($dataAsArray['post_image'], $postImageName, $urlPostImage);
    }
    if ($dataAsArray['author_photo']) {
        saveImage($dataAsArray['author_photo'], $dataAsArray['author'], $urlAuthorPhoto);
    }
    if ($dataAsArray['card_image']) {
        $postCardName = 'card_image_' . $dataAsArray['title'];
        saveImage($dataAsArray['card_image'], $postCardName, $urlCardImage);
    }

    $post = array(
        'featured' => empty($dataAsArray['featured']) ? 0 : $dataAsArray['featured'],
        'modifer' => empty($dataAsArray['modifier']) ? null : $dataAsArray['modifier'],
        'title' => $dataAsArray['title'],
        'subtitle' => $dataAsArray['subtitle'],
        'content' => $dataAsArray['content'],
        'url_post_image' => $urlPostImage,
        'url_card_image'=> $urlCardImage,
        'author' => $dataAsArray['author'],
        'url_author_photo' => $urlAuthorPhoto,
        'publish_date' => $dataAsArray['publish_date']
    );

    $stmt = $conn->prepare("INSERT INTO post (
        featured,
        modifier, 
        title, 
        subtitle, 
        content, 
        post_image_url, 
        card_image_url,
        author, 
        url_author_photo, 
        publish_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "isssssssss",
        $post['featured'],
        $post['modifer'],
        $post['title'],
        $post['subtitle'],
        $post['content'],
        $post['url_post_image'],
        $post['url_card_image'],
        $post['author'],
        $post['url_author_photo'],
        $post['publish_date']
    );


    try {
        $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        $e->getMessage();
    }
    $stmt->close();
}
closeDBConnection($conn);
