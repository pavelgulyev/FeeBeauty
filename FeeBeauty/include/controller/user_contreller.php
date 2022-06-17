<?php
require_once("include/base.php");
if (!$isUser)
{    
    header("Location: /index.php");
    exit();
}
$User = isUser();
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
     global $mysql;   
     $passwordMD5 = md5($password);
     $query = "UPDATE `user` SET `Фамилия`='$lastname',`Имя`='$name',`Отчество`='$Patronymic',`Email`='$email',`Login`='".$login."',`Password`='$passwordMD5',`avatar`='$uploadfile' WHERE `id_User`='".$User['id_User']."'";   
     print_r($query);            
     $isForm = false;                
     $isReg=mysqli_query($mysql, $query);
     if($isReg ==false){
        throw new Exception();
     }
     setcookie("login", $login, time() + 3600);
     setcookie("password", $passwordMD5, time() +3600);      
     header("Location: /index.php");          
    }
        
}

function PrintUser(){
    global $User;
    if(!isset($_POST['red'])){
    ?>
    <div class="container">
    <div class="user_PA">   

    <?php
        if($User['avatar']!=null){?>
            <img class="userPA_img" src="<?=$User['avatar'] ?>" alt="">    
       <?php }
    ?>
                  
        <div class="userPA_text">            
                <p>Имя-<?=$User['Имя']?></p>
                <p>Фамилия-<?=$User['Фамилия']?></p>
                <p>Отчество-<?=$User['Отчество']?></p>
                <p>Email-<?=$User['Email']?></p>
                <p>Login-<?=$User['Login']?></p>
            <form action="User_PA.php" method="post">
                <button class="button" name="red">Редактирвать аккаунт</button>
            </form>
        </div>      
    </div>
</div>
<?php
    }
    else{
        include ("include/blocks/register_form_block.php");
    }
}
?>


