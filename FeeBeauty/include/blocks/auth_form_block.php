<?php
require_once "include\controller\login_contreller.php";
?>
<div class="auth__box">
    <div class="container">
        <h2 class="Title">Вход</h2>
        <div class="auth">            
            <form class="auth__form" action="" method="post">
                <label class="label" for="login">Логин</label>
                <input class="input" type="text" name="login" id="login">
                <label class="label" for="login">Пароль</label>
                <input  class="input" type="password" name="password" id="password">
                <button class="button" type="submit">Вход</button> 
                <a href="register.php">Регистарция</a>
            </form>
        </div>
        
    </div>    
</div>