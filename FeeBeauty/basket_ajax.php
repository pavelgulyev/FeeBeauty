<?php
require_once("include/base.php");

if ($isUser == false) {
    echo '<div class="message_info">Для добавления товаров в корзину, '
        . 'вы должны авторизоваться.</div>';
    exit();
}
if (isset($_POST['act']) == true) {
    
    $act = htmlspecialchars($_POST['act']);
    
    if ($act == "add") {
        
        $message = '<div class="message_info">'
            . 'Ошибка добавления товара в корзину.</div>';
       
        if (isset($_POST['tovarId']) == false) {
            
            echo $message;
            exit();
        }
       
        $tovarId = (int)$_POST['tovarId'];
        
        $qAdd = "INSERT INTO `корзина` (`Пользователь`, `Товар`) VALUES ('"
            . $user["id_User"] . "', '".$tovarId."')";
        
        ChangeData($qAdd, $message, true);
    }
    
    else if ($act == "del") {
        
        $message = '<div class="message_info">'
            . 'Ошибка удаления товара из корзины.</div>';
        
        if (isset($_POST['basketId']) == false) {
            echo $message;
            exit();
        }
        $basketId = (int)$_POST['basketId'];        
        $qDel = "DELETE FROM `корзина` WHERE `Пользователь`
= '" . $user["id_User"]
            . "' AND `id_Корзина` = '" . $basketId . "'";        
        ChangeData($qDel, $message, true);
    }
}

$q = "SELECT корзина.id_Корзина AS b_id, товар.id_Tovar,
товар.Name, товар.Цена "
    . "FROM корзина INNER JOIN товар ON (товар.id_Tovar = корзина.товар) "
    . "WHERE корзина.Пользователь = '".$user['id_User']."'";
$data = GetData($q);
if ($data === false) {
    echo '<div class="message_info">В корзине нет товаров.</div>';
    exit();
}
$sum = 0; 
$count = 0; 
foreach ($data as $tovar) {    
    echo '<div class="user_basket_tovar">';
    echo '<div class="basketmini"><div class="user_basket_delete"><input
type="hidden" value="'
        . $tovar['id_Tovar'] . '" />✖</div>';    
    echo '<div class="user_basket_title">'
        . $tovar['Name'] . '</div>';    
    echo '<div class="user_basket_price"> - '
        . $tovar['Цена'] . ' ₽</div>';
    echo '</div></div>';
    $sum = $sum + $tovar['Цена'];
    $count++;
}
echo '<hr />';
echo '<div class="user_basket_itog"><span>Кол-во товаров:</span> ' . $count
    . ' шт.</div>';
echo '<div class="user_basket_itog"><span>Сумма:</span> ' .
    $sum . ' ₽</div>';
if ($count > 0)
    echo '<div class="user_basket_itog"><span class="user_basket_order"><a href="order.php">Перейти к заказу</a></span></div>';
