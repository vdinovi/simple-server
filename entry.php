<html>
<body>
<?php
    $server= 'localhost';
    $user = 'vito';
    $pass = 'Vd12345!';
    $db = 'simple_server';

    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];

    # Check if email has already been registered.
    $query = "SELECT * FROM users WHERE email='$email';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) != 0) {
        echo "Email has already been registered.";
        return;
    }

    # Enter user into database    
    $sqlfmt = "INSERT INTO users(name, email) VALUES('%s', '%s');";
    $query = sprintf($sqlfmt, $name, $email);

    if (!mysqli_query($conn, $query)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    else {
        echo "Success!";
    }
?>
</body>
</html>
