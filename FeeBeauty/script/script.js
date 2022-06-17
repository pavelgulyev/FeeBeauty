$(function () {
    $('.user_name').hover(function () {

        $(this).find('.hidden_user_block').show(500);
    },
        function () {
            $(this).find('.hidden_user_block').hide(400);
        });
    
    var userBasket = $('#userBasket');

    function ActiveDeleteButton() {
        $('.user_basket_delete').click(function () {
            var id = $(this).find('input').val();
            $(this).remove();
            $.post("/basket_ajax.php",
                { act: "del", basketId: id },
                function (data) {
                    userBasket.html(data);
                    ActiveDeleteButton();
                }
            );
        });
    }
    function LoadBasket() {
        $.post("/basket_ajax.php", function (data) {
            userBasket.html(data);
            ActiveDeleteButton();
        });
    }
    LoadBasket();
    $('.add_basket_tovar_button').click(function () {
        var basketButton = $(this);
        var inputData = basketButton.find('input');
        if (basketButton.attr('newAdd') == 0)
            return;
        basketButton.attr('newAdd', "0");
        var id = inputData.val();
        var backVal = basketButton.html();
        basketButton.html("Товар добавлен");
        setTimeout(function () {
            basketButton.html(backVal);
            basketButton.attr('newAdd', "1");
        }, 2000);
        $.post("basket_ajax.php",
            { act: "add", tovarId: id },
            function (data) {
                userBasket.html(data);
                ActiveDeleteButton();
            }
        );
    });
    var content = $('.content');
    var searchInputText = $('.input_text');
    var searchButton = $('.serch_button');
    searchButton.click(function(){
    $.get("include\\controller\\products_contreller.php",
    { input_text: searchInputText.val()},
    function(data){
    content.html(data);
    });
    });
   

    var userOrder = $('#userOrders');
    function ActiveDeleteButtonOrder() {
        $('.user_order_delete').click(function () {
            var id = $(this).find('input').val();
            $(this).remove();
            $.post("/order_ajax.php",
                { act: "del", orderid: id },
                function (data) {
                    userOrder.html(data);
                    ActiveDeleteButtonOrder();
                }
            );
        });
    }
    function LoadOrders() {
        $.post("/order_ajax.php", function (data) {
            userOrder.html(data);
            ActiveDeleteButtonOrder();
        });
    }
    LoadOrders();

    $('.order_button_submit').click(function () {
        var Adress = $(document.getElementById("address"));  
        console.log(Adress.val());      
        $.post("/order_ajax.php",
            { act: "add", 
            address:Adress.val()
            },
            function (data) {
                userOrder.html(data);
                ActiveDeleteButtonOrder();
            }
        );
        window.location.href="index.php";
    });
});