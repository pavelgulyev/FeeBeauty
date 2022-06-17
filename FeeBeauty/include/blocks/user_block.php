<?php
?>
<div class="user_block_name" id="userBlock">
    <?php 
    if($user['avatar']!=null){?>
        <img class='img_user' src="<?=$user['avatar']?>">
    <?php
        }else{
        echo "<img class='img_user' src='img/ava.svg' alt=''>";
    }
    ?>

 <p class=""><?=$user['Email']?></p>
 <a href="login.php?exit=true"><div class="btn_contact">Выход</div></a>
</div>