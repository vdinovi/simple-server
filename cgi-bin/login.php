<?php
    include 'util.php';
    $usrname = $_POST['name'];
    $passwd = $_POST['passwd'];
    $usr = authenticate($usrname, $passwd);
    $result = array();
    if (!array_key_exists('error', $usr)) {
        header("HTTP/1.1 200 OK");
        header('Content-Type: application/json');
        $result['UID'] = $usr['UID'];
        $result['msg'] = "Succesfully logged in as " . $usrname;
    }
    else {
        header("HTTP/1.1 " . $usr['error'] .  " Authentication Failure");
    }
    echo json_encode($result);
?>
