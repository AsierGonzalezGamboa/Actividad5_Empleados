<?php
    include "Empleados.php";
    include "EmpleadoPlantilla.php";
    $resultado = "";

    $empleado1 = new EmpleadoPlantilla("Asier", "Gonzalez Gamboa", "14-6766896-123", 800, 75);
    $resultado .= "<b>Empleados:</b><br>";
    $resultado .= $empleado1->mostrar();

    include "views/vista_resultado.php";
?>