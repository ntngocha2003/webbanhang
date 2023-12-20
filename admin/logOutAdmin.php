<?php
        session_start();
        if(isset($_SESSION['nameAdmin'])){

            unset($_SESSION["nameAdmin"]);
            header("location: login.php");
        }
        ?>