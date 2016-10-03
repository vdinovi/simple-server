<?php
    include 'util.php';
    /*$usrname = $_POST['usrname'];
    $passwd = $_POST['passwd'];
    header('Content-Type: application/json');
    $usr = authenticate($usrname, $passwd);
    $result = array();
    $result['msg'] = var_dump($usr);*/
    /*if (!array_key_exists('error', $usr)) {
        header("HTTP/1.1 200 OK");
        header('Content-Type: application/json');
        $result['UID'] = $usr['UID'];
        $result['msg'] = "Succesfully logged in as " . $usrname;
    }
    else {
        header("HTTP/1.1 " . $usr['error'] .  " Authentication Failure");
    }*/

    header('Content-Type: application/json');
    //$conn = mysqli_connect("simpleserver.db", "simple_server_access", "Vd12345!", "simpleserver1");
    //$result = array();
    //result['msg'] = "Error: " . mysqli_connect_errno() . PHP_EOL;
    $x = db_auth();
    if ($x == FALSE) {
       result['msg'] = "false";
    }
    result['msg'] = var_dump($x);
    echo json_encode($result)
?>
