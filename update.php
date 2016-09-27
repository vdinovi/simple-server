<?php
    header('Content-Type: application/json');

    $result = array();
    # Connect
    $conn = new mysqli('localhost', 'vito', 'Vd12345!', 'simple_server');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    # Get entries
    $entries = mysqli_query($conn, "SELECT * FROM users;");

    while ($row = mysqli_fetch_assoc($entries)) {
        $result[$row["name"]] = $row["email"];
    }
    echo json_encode($result);
?>
