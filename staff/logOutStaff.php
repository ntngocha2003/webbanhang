<?php
        session_start();
        if(isset($_SESSION['nameStaff'])){

            unset($_SESSION["nameStaff"]);
            header("location: loginStaff.php");
        }
        ?>