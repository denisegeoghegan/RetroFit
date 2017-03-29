<?php

$title = "Login or sign up";
$content = ' <form class="login" action="Login.php" method="POST">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit">Login</button>
                </form>
                <br/><br/><br/>
                <form class="login" action="Signup.php" method="POST">
                    <input type="text" name="first" placeholder="Firstname">
                    <input type="text" name="last" placeholder="Lastname">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit">Sign up</button>
                </form>';

include './Template.php';
