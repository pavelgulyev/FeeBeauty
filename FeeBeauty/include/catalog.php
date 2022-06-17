<?php 
require_once "include\controller\catalog_controller.php";
?>

<div class="main_menu">
    <div class="container">
        <nav class="second_line_main_menu">                    
            <ul>
                 <li class="category">
                     <a href="product.php">Каталог<i class="fa fa-angle-down"></i></a>
                    <div class="catalog_list<?php CategoriesOpenFunc($isCategoriesOpen); ?>">
                        <?php PrintListCategories(); ?>
                    </div>
                </li>
                <li><a href="/Contact.php">Контакты</a></li>
                <li><a href="/About_us.php">О нас</a></li>                                
            </ul>
        </nav>
    </div>
</div> 