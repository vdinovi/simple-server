<?php
    $realPass = "Vd12345!";
    $suppliedPass = key($_POST);
    if (!strcmp($realPass, $suppliedPass)) {
        $conn = new mysqli('localhost', 'vito', $realPass, 'simple_server');
        if (!$conn->connect_error) {
            mysqli_query($conn, "DELETE FROM users;");
        } 
    }
?>
