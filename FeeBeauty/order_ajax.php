<?php
require_once("include/base.php");
if ($isUser == false) {
    echo '<div class="message_info">Для отображения заказов, '
        . 'вы должны авторизоваться.</div>';
    exit();
}
if (isset($_POST['act']) == true) {
    
    $act = htmlspecialchars($_POST['act']);
    
    if ($act == "add") {
        mysqli_autocommit($mysql, FALSE);
        try {
            $orderid = mysqli_insert_id($mysql);            
            $q = "SELECT id_Корзина, товар FROM корзина WHERE Пользователь = '" . $user["id_User"] . "'";           
            $data = GetData($q);
            if ($data == false) {
                echo '<div class="message_info">Заказ пуст.</div>';
                exit();
            }
            $message = '<div class="message_info">'
            . 'Ошибка оформления заказа (не удалось добавить товар в заказ).</div>'.$orderid;
            foreach ($data as $tovar) {
                $qAdd = "INSERT INTO `заказ` (`user`, `товар`, `Статус`, `дата`, `Адрес_доставки`) VALUES ('".$user["id_User"] . "', '" 
                . $tovar["товар"] . "', '1', NOW(), '".$_POST['address']."')";
                
                ChangeData($qAdd, $message, true);
            }
            $message = '<div class="message_info">'
            . 'Ошибка оформления заказа (не удалось очистить корзину).</div>';
            $qDel = "DELETE FROM `корзина` WHERE `Пользователь` = '". $user["id_User"] . "'";
            ChangeData($qDel, $message, true);

        } catch (Exception $e) {
            mysqli_rollback($mysql);
            echo $message;
        }
        mysqli_commit($mysql);
        mysqli_autocommit($mysql, TRUE);

    }
    
    if ($act == "del") {
       
        $message = '<div class="message_info">'
            . 'Ошибка удаления заказа.</div>';
        
        if (isset($_POST['orderid']) == false) {
            echo $message;
            exit();
        }
        
        $orderid = (int)$_POST['orderid'];
        $qDel = "DELETE FROM `заказ` WHERE `id_Заказ` = '" . $orderid . "'";        
        ChangeData($qDel, $message, true);
    }
}
$q = "SELECT заказ.id_Заказ, заказ.Адрес_доставки,заказ.дата, user.Имя ,user.Фамилия ,user.Отчество, товар.Name 
 FROM `заказ` 
INNER JOIN user ON(заказ.user=user.id_User) 
INNER JOIN товар ON(заказ.товар=товар.id_Tovar) WHERE заказ.user= '" . $user["id_User"] . "'";

//Получим данные по запросу
$data = GetData($q);
//Если ничего не получили - значит корзина пуста
if ($data === false) {
    echo '<div class="message_info">Заказов нет.</div>';
    exit();
}
$count = 0; 
foreach ($data as $order) {
    echo '<div class="user_order">';    
    echo '<div class="user_order_delete"><input
type="hidden" value="'
        . $order['id_Заказ'] . '" />✖</div>';
    echo '<span class="user_order_title">Код заказа: '
        . $order['id_Заказ'] . '</span><br>';
    echo '<span class="user_order_status">'
        . $order['Статус'] . '</span><br>';
    echo '<span class="user_order_address"> - '
        . $order['Адрес доставки'] . ' </span><br>';
    echo '<span class="user_order_date">Дата: '
        . $order['дата'] . ' </span>';
    echo '</div><hr />';   
    $count++;
}
echo '<hr />';
echo '<div class="user_order_itog"><span>Кол-во заказов:</span> ' . $count
    . '.</div>';
