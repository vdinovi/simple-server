<?php
    include 'util.php';
    header("Content-Type: application/json");
    $result = array();
    if (db_cmp('simple_server_access', $_POST['passwd'])) {
        http_response_code(400);
        header("HTTP/1.1 400 Bad Request");
        $result['msg'] = "Failed to authenticate administrator";
    }
    else {
        $conn = db_connect();
        if (!$conn->connect_error) {
            mysqli_query($conn, "DELETE FROM usr_auth;");
            header("HTTP/1.1 200 OK");
        }
        else {
            header("HTTP/1.1 Internal Server Error");
            $result['msg'] = "Error connecting to database";
        }
    }
    echo json_encode($result);
?>
