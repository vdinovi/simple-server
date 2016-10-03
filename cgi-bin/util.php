<?php

    // Create a json-formatted file called db.conf in $SERVER_ROOT/private/etc/
    // {
    //    "server": "servername",
    //    "user": "username",
    //    "password": "password",
    //    "database": "database"
    // }
    function db_auth() {
        //if ($authdata = file_get_contents("../../private/etc/db.conf")) {
        if ($authdata = file_get_contents("../db.conf")) {
            //return json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $authdata), true);
            return json_decode($authdata, true);
        }
        return FALSE;
    }

    function db_connect() {
        $auth = db_auth();
        if ($auth) {
            return mysqli_connect($auth['server'], $auth['user'], $auth['password'], $auth['database']);
        }
        return FALSE;
    }

    function authenticate($usrname, $passwd) {
        $result = array();
    
        $conn = db_connect();
        if ($conn == FALSE || $conn->connect_error) {
            $result['error'] = 500;
            return $result;
        }

        $query = "SELECT * FROM usr_auth WHERE usrname='$usrname';";
        $usr = mysqli_fetch_assoc(mysqli_query($conn, $query));
        if (!count($usr) || ($usr['passwd'] != $passwd)) {
            $result['error'] = 400;
        }
        else {
            $result['UID'] = $usr['UID'];
        }
        return $result;
    }
?>

