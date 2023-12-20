
    <?php
        session_start();
        if(isset($_SESSION['name'])){

            
            unset($_SESSION['name']);
            unset($_SESSION['cart']);
            header("location: loginClient.php");
        }
        ?>
        
