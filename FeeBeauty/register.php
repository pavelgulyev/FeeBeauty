<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="/script/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="/script/script.js"></script>
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">  
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php
        require_once "include/header.php";
        require_once "include/catalog.php";
        require_once "include/controller/register_contreller.php";    
        ?>
        <?php
        PrintErrorMessage($errorMessage);
        WriteRegisterForm($isForm);
        ?>
        <?php
        require_once "include/footer.php";
         ?>
    </div>
</body>

</html>