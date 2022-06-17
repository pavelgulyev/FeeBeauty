<?php
//Подключается базовый код соединения с БД
 require_once("include/base.php");
//Функция,выводящая блок пользователя
 function UserBlock($isUser, $user)
 {    
    if($isUser == true)
    {        
        include ("include/blocks/user_block.php");
    }        
    else
    {
        echo '<a href="../login.php"><div class="btn_contact">Вход</div></a> ';
    }
 }
?>
