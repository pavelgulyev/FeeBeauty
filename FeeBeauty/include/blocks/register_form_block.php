<div class="register">
    <div class="container">
        
        <form class="register__form" action="" method="post"  enctype = 'multipart/form-data'>
            <label class="label" for="Name">Имя</label>
            <input class="input" value="<?=$User['Имя']?>"  type="text" name="Name" id="Name">
            <label class="label" for="lastname">Фамилия</label>
            <input class="input" value="<?=$User['Фамилия']?>"  type="text" name="lastname" id="lastname">
            <label class="label" for="Patronymic">Отчество</label>
            <input class="input" value="<?=$User['Отчество']?>" type="text" name="Patronymic" id="Patronymic">
            <label class="label" for="Email">Email</label>
            <input class="input" value="<?=$User['Email']?>"  type="email" name="Email" id="Email">
            <label class="label" for="login">Логин</label>
            <input class="input" value="<?=$User['Login']?>"  type="text" name="login" id="login">
            <label class="label" for="password">Пароль</label>
            <input class="input" type="password" name="password" id="password"> 
            <label class="label" for="password">Портрет профиля </label> 
            <input type = "file" name = "somename" />
            <button class="button" type="submit">Регистрация</button>
            
        </form>
    </div>    
</div> 