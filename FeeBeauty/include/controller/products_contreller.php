<?php

require_once("include/base.php");

$q = "SELECT * FROM товар";

if (isset($_GET['cat'])) {
    
    $q = $q . " WHERE Категория = " .
        ((int)($_GET['cat']));
}
if (isset($_GET['input_text'])) {    
    global $mysql;
    $text = trim($_GET['input_text']);
    $text = mysqli_real_escape_string($mysql, $text);    
    if (isset($_GET['cat'])) {       
        $q = $q . " where Категория='".$_GET['cat']."' and  Name LIKE '%".$text."%'";
    }   
    else {        
        $q = $q . " where Name LIKE '%".$text."%'";
    }
}
// 
//Отправляем запрос, получаем данные
$products = GetData($q);
//Выводит список продуктов
function PrintListProducts($productsList, $isUser)
{
    //Если список товаров не пуст
    if ($productsList != false) {
        //То выводим их в цикле
        foreach ($productsList as $product) {
            //Используя включаемый блок товара            
            include("include/blocks/product_block.php");          
        }
    }

    //Если список товаров пуст
    else {
        echo '<div class="message_info_box">Ничего не найдено</div>';
    }
}
if(isset($_GET['id_T'])){
    $q="SELECT * FROM товар WHERE id_Tovar=".((int)($_GET['id_T']));
}
$product = GetData($q);
function PrintCardProduct($product, $isUser)
{?>
    <div class="Card_Product">
        <div class="container">
            
        </div>
    </div>
    
<?php
}
?>
