<?php
session_start();

$conn =mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud',
);
//comprobacion
//isset es existe
/*
if(isset($conn)){
    echo 'estoy conectado';
}
*/
?>