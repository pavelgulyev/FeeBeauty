<?php
if (isset($isUser) == false) {
    exit();
}
?>
<div class="user_PA" id="tovar_id_<?php echo $isUser['id_Tovar']; ?>">      
        <img class="userPA_img" src="<?=$isUser['avatar']?>" alt="">
        <span class="price">
        <?php echo $isUser['Цена']. " ₽"; ?>
        </span>
        <div class="userPA_text">
            <div class="tovar_title">
                <?php echo $isUser['Имя']; ?>
            </div>
        </div>       
        
   
</div>

