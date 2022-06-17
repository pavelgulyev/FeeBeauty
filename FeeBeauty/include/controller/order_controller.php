<?php

require_once("include/base.php");
if ($isUser == false) {
    echo '<div class="message_info">Вы должны авторизоваться.</div>';
    exit();
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
function PrintOrder($data, $user)
{
    $sum = 0; //Посчитаем итоговую сумму всех товаром
    $count = 0;
    foreach ($data as $tovar) {
         echo '<div class="user_order_tovar">';
        echo '<span class="user_order_title">'
            . $tovar['Name'] . '</span>';
       echo '<span class="user_order_price"> - '
        . $tovar['Цена'] . ' ₽</span>';
        echo '</div>';
        $sum = $sum + $tovar['Цена'];
        $count++;
    }
    echo '<hr width="50%" align="left" size="3">';
    echo '<div class="user_order_itog"><span>Кол-во товаров:</span> ' . $count
        . ' шт.</div>';
    echo '<div class="user_order_itog"><span>Сумма:</span> ' .
        $sum . ' ₽</div>';

}
    