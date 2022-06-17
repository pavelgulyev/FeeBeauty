<?php
if(isset($_GET["exit"]) && $_GET["exit"] == "true")
{
    setcookie("login", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    header("Location: /");
    exit();
}
require_once("include/base.php");
if ($isUser == true)
{
    header("Location: /index.php");
    exit();
}
$errorMessage = Array();
if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];    
    $password = md5($_POST['password']);
    $Login = GetData("SELECT `Login` FROM user WHERE `Login` = '$login' " ."AND `Password` = '$password'");       
    if($Login != false)
    {        
        print_r($login);
        setcookie("login", $login, time() + 3600);
        setcookie("password", $password, time() + 3600);        
        header("Location: /index.php");        
        exit();
    }
    else
    {
    $errorMessage[] = "Неправильные имя пользователя или пароль";
    }
}