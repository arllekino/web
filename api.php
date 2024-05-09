<?php
require_once './DBConnection';
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
    $namePhoto = str_replace([' '], ['-'], $namePhoto);
    saveFile("./static/image/{$namePhoto}.{$imgExtention}", $imageDecoded);
    $urlImage = "./static/image/{$namePhoto}.{$imgExtention}";
}

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method === 'POST') {
    $dataAsJson = file_get_contents('php://input');
    $dataAsArray = json_decode($dataAsJson, true);
    if ($dataAsArray['img']) {
        saveImage($dataAsArray['img'], $dataAsArray['title'], $urlMainPhoto);
    }
    if ($dataAsArray['img_author']) {
        saveImage($dataAsArray['img_author'], $dataAsArray['author'], $urlAuthor);
    }


    $stmt = $conn->prepare("INSERT INTO post (
        featured,
        modifier, 
        title, 
        subtitle, 
        content, 
        img_url, 
        author, 
        img_author_url, 
        publish_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "issssssss",
        $dataAsArray['featured'],
        $dataAsArray['modifier'],
        $dataAsArray['title'],
        $dataAsArray['subtitle'],
        $dataAsArray['content'],
        $urlMainPhoto,
        $dataAsArray['author'],
        $urlAuthor,
        $dataAsArray['publish_date']
    );


    $stmt->execute();
    $stmt->close();
}
closeDBConnection($conn);
