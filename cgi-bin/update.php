<?php
    include 'util.php';
    header('Content-Type: application/json');

    $result = array();

    $conn = db_connect();
    if ($conn and $conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    # Get entries
    $entries = mysqli_query($conn, "SELECT * FROM users;");

    while ($row = mysqli_fetch_assoc($entries)) {
        $result[$row["name"]] = $row["email"];
    }
    echo json_encode($result);
?>
