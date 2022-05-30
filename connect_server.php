<?php

    $db_server = '127.0.0.2:3307';
    $db_user = 'root';
    $db_password = '';
    $db_name =  'phase_2';

    if( !$connection = mysqli_connect($db_server,$db_user,$db_password,$db_name)   )
    {
        die("Connection to the server failed....try reconnecting");
    }

?>  