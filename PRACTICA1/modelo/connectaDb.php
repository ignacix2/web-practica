<?php

#require_once __DIR__."/../model/Config.php";

function getConn(){

//SINGLETON
    return pg_connect("host= 127.0.0.1 port=5432 dbname=tdiw-h4 user=tdiw-h4 password=oyZ3Jt2X"); //or die ("Could not connect to server\n");
}

function example () {

    $connexio = getConn();
    $result = pg_query($connexio, "SELECT * FROM categories");
    $filas = pg_fetch_all($result);
    return $filas;   
}