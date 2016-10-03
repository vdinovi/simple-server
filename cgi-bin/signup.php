<?php
    include 'util.php';
    header('Content-Type: application/json');
    $usrname = $_POST['usrname'];
    $passwd = $_POST['passwd'];
    $result = array();

    $usr = authenticate($usrname, $pass);
    if (array_key_exists('error', $usr)) {
        $conn = db_connect();
        if ($conn->connect_error) {
            header("HTTP/1.1 500 Internal Server Error");
            $result['msg'] = "Failed to connect to database";
        }
        else if($usr['error'] == 400) {
            //$UID = substr(md5($usrname, true), 0, 12); 
            $UID = 4;
            $query = 
                "INSERT INTO usr_auth(usrname, passwd, UID) VALUES('$usrname', '$passwd', $UID);";
            if (!mysqli_query($conn, $query)) {
                header("HTTP/1.1 500 Internal Server Error");
                $result['msg'] = "Failed to enter user into database";
            }
            else {
                header("HTTP/1.1 200 OK");
                $result['msg'] = 
                    "User account for " . $usrname . " created. Please log in to continue";    
            }
        }
        else {
            header("HTTP/1.1 500 Internal Server Error");
            $result['msg'] = "Unknown failure";
        }
    }
    else {
        header("HTTP/1.1 409 Conflict");
        $result['msg'] =
            "User account for " . $usrname . " exists";
    }
    echo json_encode($result);
?>
