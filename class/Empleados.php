<?php

namespace EmpleadosEmpresa;

abstract class Empleado
{
    private $nombre;
    private $apellido;
    private $numeroSeguridadSocial;

    public function __construct($nombre, $apellido, $numeroSeguridadSocial)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numeroSeguridadSocial = $numeroSeguridadSocial;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getNumeroSeguridadSocial()
    {
        return $this->numeroSeguridadSocial;
    }

    public function setNumeroSeguridadSocial($numeroSeguridadSocial)
    {
        $this->numeroSeguridadSocial = $numeroSeguridadSocial;

        return $this;
    }

    public abstract function ingresos();

    public function mostrar()
    {
        return "Está empleado " . ($this->nombre) . " " . ($this->apellido) . " con el NSS: " . ($this->numeroSeguridadSocial);
    }
}
class EmpleadoPlantilla extends Empleado
{
    private $sueldo;
    private $dietas;

    public function __construct($nombre, $apellido, $numeroSeguridadSocial, $sueldo, $dietas)
    {
        parent::__construct($nombre, $apellido, $numeroSeguridadSocial);
        $this->sueldo = $sueldo;
        $this->dietas = $dietas;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    public function getDietas()
    {
        return $this->dietas;
    }

    public function setDietas($dietas)
    {
        $this->dietas = $dietas;

        return $this;
    }

    public function ingresos()
    {
        return $this->sueldo + $this->dietas;
    }

    public function mostrar()
    {
        $mensaje = parent::mostrar();
        $mensaje .= "<br>Los ingresos: " . $this->ingresos();
        return $mensaje;
    }
}

class EmpleadoPorComision extends Empleado
{
    private $horas;
    private $tarifa;
    private $base;

    public function __construct($nombre, $apellido, $numeroSeguridadSocial, $horas, $tarifa, $base)
    {
        parent::__construct($nombre, $apellido, $numeroSeguridadSocial);
        $this->horas = $horas;
        $this->tarifa = $tarifa;
        $this->base = $base;
    }

    public function getHoras()
    {
        return $this->horas;
    }

    public function setHoras($horas)
    {
        $this->horas = $horas;

        return $this;
    }

    public function getTarifa()
    {
        return $this->tarifa;
    }

    public function setTarifa($tarifa)
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    public function getBase()
    {
        return $this->base;
    }

    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    public function ingresos()
    {
        return $this->base + ($this->horas * $this->tarifa);
    }

    public function mostrar()
    {
        $mensaje = parent::mostrar();
        $mensaje .= "<br>Los ingresos: " . $this->ingresos();
        return $mensaje;
    }
}

class PruebaPolimorf
{
    static public function calcular($empleado)
    {
        return "Los ingresos de " . $empleado->getNombre() . " son " . $empleado->ingresos();
    }
}

class Empresa
{
    private $empresa = array();

    public function addEmpleados($empleado)
    {
        $this->empresa[] = $empleado;
    }

    public function listarEmpleados()
    {
        $lista = "";
        foreach ($this->empresa as $empleado) {
            $lista .= "Está empleado " . $empleado->getNombre() . " " . $empleado->getApellido() . " con el NSS: " . $empleado->getNumeroSeguridadSocial() . "<br>";
        }
        return $lista;
    }

    public function sumaIngresos()
    {
        $ingresosTotales = 0;
        foreach ($this->empresa as $empleado) {
            $ingresosTotales += $empleado->ingresos();
        }
        return $ingresosTotales;
    }

    // Función que retorna el empleado con mayor ingresos de la Empresa
    public function mayorIngresos()
    {
        $mayorIngreso = 0;
        foreach ($this->empresa as $empleado) {
            if ($empleado->ingresos() > $mayorIngreso) {
                $mayorIngreso = $empleado->ingresos();
                $empleadoIngreso = $empleado;
            }
        }

        return $empleadoIngreso;
    }
}

?>