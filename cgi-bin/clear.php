<?php
    include 'util.php';
    if (!($auth = authenticate())) {
        header("HTTP/1.1 500 Internal Server Error");
        return;
    } 
    # Authentication failure
    if ($auth['passwd'] != $_POST['passwd']) {
        http_response_code(400);
        header("HTTP/1.1 400 Bad Request");
        return;
    }
    # Attempt to connect, if successful delete user table.
    $conn = sql_connect();
    if ($conn != FALSE && !$conn->connect_error) {
        mysqli_query($conn, "DELETE FROM users;");
        header("HTTP/1.1 200 OK");
    }
?>
