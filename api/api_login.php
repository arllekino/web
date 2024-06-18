<?php
require_once __DIR__ . '/../DBConnection.php';
$connection = createDBConnection();

$method = $_SERVER['REQUEST_METHOD'];

const SALT = 'NotSugar';

if ($method === 'POST') 
{
    $dataAsJson = file_get_contents('php://input');
    $dataAsArray = json_decode($dataAsJson, true);

    $password = md5($dataAsArray['password'] . SALT);
    $email = $dataAsArray['email'];

    $query = "SELECT
                  admin_id,
                  email,
                  admin_password
              FROM
                  admin_user
              WHERE
                  email = ? 
    ";
    try {
        $statement = $connection->prepare($query);
        $statement->bind_param(
            "s",
            $email,
        );
        $statement->execute();

        $result = $statement->get_result();
        $row = mysqli_fetch_array($result);
    } catch (mysqli_sql_exception $error) {
        $error->getMessage();
    }

    if ($password == $row['admin_password']) 
    {
        session_name('auth');
        session_start();
        $_SESSION['user_id'] = $row['admin_id'];
        http_response_code(200);
    } else 
    {
        http_response_code(401);
    }
}
closeDBConnection($connection);