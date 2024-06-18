<?php

session_name('auth');
session_start();
$_SESSION = [];
session_destroy();
if (setcookie(session_name(), '', time() - 3600)) 
{
    http_response_code(200);
} else 
{
    http_response_code(401);
}