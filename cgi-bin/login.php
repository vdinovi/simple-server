<?php
    include 'util.php';
    $usrname = $_POST['usrname'];
    $passwd = $_POST['passwd'];

    header('Content-Type: application/json');
    $result = array();

    $usr = authenticate($usrname, $passwd);
    if (!array_key_exists('error', $usr)) {
        header("HTTP/1.1 200 OK");
        $result['UID'] = $usr['UID'];
        $result['msg'] = "Succesfully logged in as " . $usrname;
    }
    else {
        header("HTTP/1.1 " . $usr['error'] .  " Authentication Failure");
    }
    echo json_encode($result);
?>
