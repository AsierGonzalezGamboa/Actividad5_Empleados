<?php
    include "class/Empleados.php";
    use EmpleadosEmpresa\EmpleadoPlantilla as Plantilla;
    use EmpleadosEmpresa\EmpleadoPorComision as EmpleadoComision;
    use EmpleadosEmpresa\PruebaPolimorf as Polimorfismo;
    use EmpleadosEmpresa\Empresa as Empresa;

    $empresa = new Empresa();

    $resultado = "";

    $empleadoPlantilla = new Plantilla("Asier", "Gonzalez Gamboa", "14-32165478-12", 700, 60);
    $empleadoPlantilla2 = new Plantilla("Maite", "Álvarez Galar", "34-98056841-23", 400, 20);
    $resultado .= "<h2>Empleados:</h2><h3>Empleado Asalariado:</h3>";
    $resultado .= $empleadoPlantilla->mostrar();
    $resultado .= "<br>" . $empleadoPlantilla2->mostrar();

    $empleadoComision = new EmpleadoComision("Pepe", "Goicocechea Larumbe", "28-12345678-40", 8, 10, 60);
    $resultado .= "<h3>Empleado Por Comision:</h3>";
    $resultado .= $empleadoComision->mostrar();

    $resultado .= "<h3>Prueba Polimorfismo:</h3>";
    $resultado .= Polimorfismo::calcular($empleadoPlantilla) . "<br>" . Polimorfismo::calcular($empleadoPlantilla2) .  "<br>" . Polimorfismo::calcular($empleadoComision);

    $empresa->addEmpleados($empleadoPlantilla);
    $empresa->addEmpleados($empleadoPlantilla2);
    $empresa->addEmpleados($empleadoComision);

    $resultado .= "<h3>Listado Empresa:</h3>";
    $resultado .= $empresa->listarEmpleados();

    $resultado .= "<h3>Empleado con mayor ingresos: </h3>";
    $resultado .= "El empleado ". ($empresa->mayorIngresos())->getNombre() ." ". ($empresa->mayorIngresos())->getApellido() . " es el empleado con mayor ingresos, con un total de ". ($empresa->mayorIngresos())->ingresos();

    $resultado .= "<h3>La suma total de ingresos es: ". $empresa->sumaIngresos()."</h3>";

    include "views/vista_resultado.php";
?>