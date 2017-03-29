<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Pacifico|Shrikhand" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="Stylesheets/Stylesheet.css"/>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title        
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">
                <div class="logo"><h1>RetroFit</h1></div>
                <div id="brands_up">
                    <img src="Images/adidaslogo.jpg"/>
                    <img src="Images/nikelogo.jpg"/>
                    <img src="Images/pumalogo.png"/>      
                </div>
                <div id="brands_down">
                    <img src="Images/umbrologo.jpg"/>
                    <img src="Images/asicslogo.jpg"/>
                    <img src="Images/filalogo.jpg"/>
                </div>
            </div>
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Products.php">Products</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="CMS.php">Admin</a></li>
                    <li><a href="Loginform.php">Login</a></li>
                </ul>

            </nav>
            <div id="content_area">
                <?php echo $content; ?>
            </div>
            <div id="sidebar">    

            </div>

        </div>
        <footer>
            <p>All rights reserved</p>
        </footer>
    </body>

</html>