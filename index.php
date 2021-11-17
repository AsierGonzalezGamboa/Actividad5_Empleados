<?php
    include "Empleados.php";
    include "EmpleadoPlantilla.php";

    $empresa = new Empresa();

    $resultado = "";

    $empleadoPlantilla = new EmpleadoPlantilla("Asier", "Gonzalez Gamboa", "14-32165478-12", 700, 60);
    $resultado .= "<h2>Empleados:</h2><h3>Empleado Asalariado:</h3>";
    $resultado .= $empleadoPlantilla->mostrar();

    $empleadoComision = new EmpleadoPorComision("Pepe", "Goicocechea Larumbe", "28-12345678-40", 8, 10, 60);
    $resultado .= "<h3>Empleado Por Comision:</h3>";
    $resultado .= $empleadoComision->mostrar();

    $resultado .= "<h3>Prueba Polimorfismo:</h3>";
    $resultado .= PruebaPolimorf::calcular($empleadoPlantilla) . "<br>" . PruebaPolimorf::calcular($empleadoComision);

    $empresa->addEmpleados($empleadoPlantilla);
    $empresa->addEmpleados($empleadoComision);

    $resultado .= "<h3>Listado Empresa:</h3>";
    $resultado .= $empresa->listarEmpleados();

    $resultado .= "<h3>Empleado con mayor ingresos: </h3>";
    $resultado .= "El empleado ". ($empresa->mayorIngresos())->getNombre() . ($empresa->mayorIngresos())->getApellido() . " es el empleado con mayor ingresos, con un total de ". ($empresa->mayorIngresos())->ingresos();

    $resultado .= "<h3>La suma total de ingresos es: ". $empresa->sumaIngresos()."</h3>";

    include "views/vista_resultado.php";
?>