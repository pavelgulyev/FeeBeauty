<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="/script/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="/script/script.js"></script>
    <script type="text/javascript" src="/script/jquery-3.6.0.min.js"></script>
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php
        require_once "include/header.php";
        require_once "include/catalog.php";
        ?>
        <main>
            <div class="container">
                <div class="Contact">
                    <h1>Наши контакты</h1>     
                    <div class="row">
                        <h2>Адрес</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8025.7129664520735!2d39.11694107484346!3d51.68230671733249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x413b2930970dfc5b%3A0xa30d3b91325dd8e0!2z0KLQpiDQltC10LzRh9GD0LbQvdGL0Lk!5e0!3m2!1sru!2sru!4v1653281519810!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>           
                   
                </div>
                
            </div>
        </main>   
        <?php         
        require_once "include/footer.php";
         ?>
    </div>
</body>

</html>