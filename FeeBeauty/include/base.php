<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $servername = "127.0.0.1";
 $database = "beautyonlinestore";
 $username = "root";
 $password = "";



 $mysql = @mysqli_connect($servername, $username, $password, $database);


if ($mysql->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
 function GetData($queryString)
 {
     global  $mysql;

    $q = mysqli_query($mysql, $queryString);

    if($q==false)
    {
       echo'<b>Произошла ошибка во время
        запроса:</b> <br />'.mysqli_error($mysql);
        exit(); 
    }
  
    $rows = array();

    $row = mysqli_fetch_assoc($q);

    if($row == null || mysqli_num_rows($q) == 0)
    {

    return false;
    }
    do
    {
   
    $rows[] = $row;

    $row = mysqli_fetch_assoc($q);
    }
    while ($row != false);
    return $rows;
 }

 function PrintErrorMessage($errors)
 {
    if(count($errors) > 0)
    {
        echo '<div class="message_error_box">';
        foreach($errors as $message)
        {
            echo '<span>❯ '.$message."</span><br />";
        }
        echo '</div>';
    }
}
   

function isUser(){
    if(isset($_COOKIE["login"]) && isset($_COOKIE["password"]))
    {        
        $login = htmlspecialchars($_COOKIE["login"]);
        $password = $_COOKIE["password"];
        //Делаем запрос БД на вход тек пользователя
        $user = GetData("SELECT * FROM user WHERE `Login` = '$login' " ."AND `Password` = '$password';");  
        if($user===false)
        {            
            setcookie("login", "", time() - 3600);
            setcookie("password", "", time() - 3600);            
            return false;
        }
        return $user[0];
        
    }    
    return false;
}
$user = isUser();

$isUser = ($user === false) ? false : true; 
function ChangeData($q, $message, $exit = false)
{    
    global $mysql;
    try
    {        
        $is = mysqli_query($mysql, $q);  
        if($is == false)
        {        
            throw new Exception();
        }
    }    
    catch(Exception $e)
    {
        echo $message;
        if ($exit == true)
        {
            exit();
        }
    }
}
