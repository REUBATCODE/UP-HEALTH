<?php
    function validarUsuario(){
        session_start();
        if(empty($_SESSION['nombre'])){
            header('location: index.php');
        }
    }
?>