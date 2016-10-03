<?php
    include 'util.php';
    header('Content-Type: application/json');

    $result = array();

    $conn = db_connect();
    if ($conn && $conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    # Get entries
    $entries = mysqli_query($conn, "SELECT * FROM usr_auth;");

    while ($row = mysqli_fetch_assoc($entries)) {
        array_push($result, $row['usrname']);
    }
    echo json_encode($result);
?>
