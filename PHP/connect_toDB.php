<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'v5';

    $connect = new mysqli($db_host, $db_username, $db_password, $db_name);

    if(mysqli_connect_errno())
    {
        echo 'Failed to connect to the database.'.mysqli_connect_error();
    }
    /*else
    {
        echo 'Connect successful.';
    }*/    
?>