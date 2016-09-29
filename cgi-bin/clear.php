<?php
    # store this in  /etc/pass
    $passfile = fopen("../../etc/pass", "r") or die("TODO:send http error");
    
    #$user = key(

    $suppliedPass = key($_POST);
    if (!strcmp($realPass, $suppliedPass)) {
        $conn = new mysqli('simpledb.db', $user, $pass, 'simple_server');
        if (!$conn->connect_error) {
            mysqli_query($conn, "DELETE FROM users;");
        } 
    }
?>
