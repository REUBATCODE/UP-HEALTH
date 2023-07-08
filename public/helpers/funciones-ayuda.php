<?php
/* Muestra en pantalla informarcion extendida de una variable:
    - tipo 
    - valor
    - información organizada*/
function verinfo_var($variable_a_mostrar){
    echo "<pre>";
    var_dump($variable_a_mostrar);
    echo "</pre>";
}