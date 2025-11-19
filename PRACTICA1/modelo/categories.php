<?php

/**
 *@return array
 */

 function getCategories(): array
{
    $conn = getConn();
    $sql = ("SELECT * FROM categoria");
    $stmt = pg_query($conn, $sql);
    $filas = pg_fetch_all($stmt);
    var_dump($filas);//eliminar en teoria
    return $filas;
}