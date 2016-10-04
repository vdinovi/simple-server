<?php
    include 'util.php';
    header('Content-Type: application/json');
    $usrname = $_POST['usrname'];
    $passwd = $_POST['passwd'];
    $result = array();

    $usr_exists = does_user_exist($usrname);
    if (!$usr_exists) {
        if($usr['error'] = 400 && $conn = db_connect()) {
            $UID = substr(md5($usrname, false), 0, 11); 
            $query = 
                "INSERT INTO usr_auth(usrname, passwd, UID) VALUES('$usrname', '$passwd', '$UID');";
            if (!mysqli_query($conn, $query)) {
                header("HTTP/1.1 500 Internal Server Error");
                $result['msg'] = "UID = $UID  Failed to enter user into database";
            }
            else {
                header("HTTP/1.1 200 OK");
                $result['msg'] = 
                    "User account for " . $usrname . " created. Please log in to continue";
            }
        }
        else {
            header("HTTP/1.1 500 Internal Server Error");
            $result['msg'] = "Unknown error";
        }
    }
    else {
        header("HTTP/1.1 409 Conflict");
        $result['msg'] =  "User account for " . $usrname . " exists";
    }
    echo json_encode($result);
?>
