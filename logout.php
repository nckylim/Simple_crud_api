<html>
    <body>
        <?php 
            session_start();
            require_once 'conn.php';

            session_destroy();
                echo "<script> window.location='index.php'; </script>";

        ?>
    </body>
</html>