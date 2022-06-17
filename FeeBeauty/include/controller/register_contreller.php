<?php
require_once("include/base.php");
if ($isUser)
{    
    header("Location: /index.php");
    exit();
}

$errorMessage = Array();
$isForm = true;

if(isset($_POST['Name']) && isset($_POST['lastname']) && isset($_POST['Patronymic'])&&
    isset($_POST['Email']) && isset($_POST['login']) && isset($_POST['password'])){
    $email = htmlspecialchars(trim($_POST['Email']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $name = htmlspecialchars(trim($_POST['Name']));
    $Patronymic = htmlspecialchars(trim($_POST['Patronymic']));
    $login = htmlspecialchars(trim($_POST['login']));   
    $password = htmlspecialchars(trim($_POST['password']));      
    if(strlen($password) < 6){
        $errorMessage[] = "Пароль должен содержать минимум 6 символов!.";
    }
    if(strlen($lastname) < 2){
        $errorMessage[] = "Фамилия должна содержать минимум 2 символа!.";
    }
    if(strlen($name) < 1){
        $errorMessage[] = "Имя должно содержать минимум 1 символов!.";
    }
    if(strlen($Patronymic) < 2){
        $errorMessage[] = "Отчество должно содержать минимум 2 символа!.";
    }
    
    if(strlen($login) < 2){
        $errorMessage[] = "Логин должен содержать минимум 2 символа!.";
    }
   if(isset($_FILES)){
       $uploadfile = "image/".$_FILES['somename']['name'];
       move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);
   }
    

   

    if(count($errorMessage)==0)
    {        
        $isUserIS=GetData("SELECT `id_User` FROM user WHERE `login`= '$login'");
        if($isUserIS==false){
             global $mysql;   
                $passwordMD5 = md5($password);
                $query = "INSERT INTO `user` ( `Фамилия`, `Имя`, `Отчество`, `Email`, `Login`, `Password`, Avatar)"." 
                VALUES ('$lastname', '$name', '$Patronymic', '$email', '$login', '$passwordMD5', '$uploadfile')";    
                print_r($query);            
                $isForm = false;
                try{
                    $isReg=mysqli_query($mysql, $query);
                    
                    if($isReg ==false){
                        throw new Exception();
                    }
                    setcookie("login", $login, time() + 3600);
                    setcookie("password", $passwordMD5, time() +3600);      
                    header("Location: /index.php");          
                }
                catch(Exception $e){
                    $isForm = true;                    
                    $errorMessage[] = "Во время регистрации произошла ошибка.";
                }
            }
            else{
                $errorMessage[] = "Пользователь с такой Login - " . $login .", уже зарегистрирован!";
            }

    }
        
}

function WriteRegisterForm($isForm)
 {
    if($isForm == true)
    {
        ?>
        <h2 class="Title">Регистрация</h2>
        <?php
        include ("include/blocks/register_form_block.php");
    }
    else
    {
        echo '<div class="message_info_box">Вы успешно зарегистрированы!</div>';
    }
 }