<?php
        session_start();
        if(isset($_SESSION['nameStaff'])){

            session_destroy();
            header("location: loginStaff.php");
        }
        ?>