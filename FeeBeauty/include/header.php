<?php 
require_once "controller/header_contreller.php";
 ?>
<div class="header">
    <div class="second_line">
        <div class="container">
            <div class="line_hi">
                <a href="/"><div class="logo">
                    <img class="img_logo" src="img/logo.svg" alt="">
                    <p class="text_logo">beauty</p>
                </div>    </a>
                <div class="search_block">
                    <form action="/product.php" method="get" class="search_form">
                        <input type="search" class="search" name="input_text" placeholder="Наименование работы" class="input_text" />
                        <input type="submit" name="" value="" class="search_button" />
                    </form>
                </div>              
                    
                <div class="user_block">
                
                        <div class="user_name"> 
                                         
                            <img src="img/Shop.svg" alt="" id="shop_img">                               
                            <div class="hidden_user_block" id="userBasket">                            
                            </div>            
                    </div>                  
                  <div class="user_name">                        
                            <p>Заказы</p>                            
                            <div class="hidden_user_block" id="userOrders">                            
                            </div>            
                    </div>   
                    <a class="user_block_name" href="User_PA.php">   <?php UserBlock($isUser, $user); ?></a> 
                    </div>                                  
                </div>
            </div>
        </div>
    </div>
