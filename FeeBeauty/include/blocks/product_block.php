<?php
//если переменной $product или $isUser не существует
if (isset($product) == false || isset($isUser) == false) {
    exit();
}
?>
<div class="tovar_block" id="tovar_id_<?php echo $product['id_Tovar']; ?>">
      
        <img src="<?=$product['Картинка']?>" alt="">
        <span class="price">
        <?php echo $product['Цена']. " ₽"; ?>
        </span>
        
        <div class="tovar_title">
            <?php echo $product['Name']; ?>
        </div>
        <?php
            if ($isUser == true) {
                //Добавляем активную кнопку
                echo '<button class="add_basket_tovar_button"><input type="hidden" ' . 'value="' . $product['id_Tovar'] . '" />В корзину</button>';
            }
        ?>
        <div class="tovar_footer">
            Артикул:
            <span class="gray_bold">
                <?php echo $product['Артикул']; ?>
            </span>
        </div>
   
</div>