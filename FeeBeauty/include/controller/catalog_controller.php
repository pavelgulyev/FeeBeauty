<?php
 //Подключается базовый код соединения с БД
 require_once("include/base.php");
 //Если существует параметр открытия, то добавляется дополнительный класс
 function CategoriesOpenFunc($parametr)
 {
    //Если был создан параметр открытия и он равен истине
    if(isset($parametr) && $parametr == true)
    {
        //То добавляем класс open, чтобы меню отображалось всегда
        echo " open";
    }
 }
 //Выводит список категорий
function PrintListCategories()
{
    global  $mysql;
    $sql="SELECT * FROM `категория`";
    $categories = GetData($sql);   
    if ($categories != null)
    {
        foreach($categories as $cat)
        {
            if (isset($_GET["input_text"]) && $_GET["input_text"] != "")
            {
            echo   '<div class="link_cat"><a href="/product.php?cat='.$cat['id_Category'].'&text='.$_GET["text"].'">'.$cat['Name'].'</a></div>';
            }
            else
            {                
                echo '<div class="link_cat"><a href="/product.php?cat='.$cat['id_Category'].'">'.$cat['Name'].'</a></div>';
            }
        }
    }
}
     ?>