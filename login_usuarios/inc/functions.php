<?php
function menu(){
    echo "<header class='header-island'>
    <a href='menu.php'>Menu</a> 
    <a href='perfil.php'>Perfil</a> 
    <a href='contacto.php'>Contacto</a> 
    <a href='ejercicio.php'>Ejercicios</a> 
    <a href='logout.php'>Salir</a><br></header>";
}

function validarUsuario(){
  session_start();
  if(!isset($_SESSION['usuario']) && empty($_SESSION['usuario']))
  {
    header('location: index.php');
  }
}

?>