<?php

    // Create a json-formatted file called db.conf in $SERVER_ROOT/etc/
    // {
    //    "server": "servername",
    //    "user": "username",
    //    "password": "password",
    //    "database": "database"
    // }
    function authenticate() {
        if ($authdata = file_get_contents("../../etc/db.conf", "r")) {
            return json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $authdata), true);
        }
        return FALSE;
    }

    function sql_connect() {
        $auth = authenticate();
        if ($auth) {
            return mysqli_connect($auth['server'], $auth['user'], $auth['passwd'], $auth['database']);
        }
        return FALSE;
    }
?>

