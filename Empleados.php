<?php


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
