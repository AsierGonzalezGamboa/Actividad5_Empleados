<?php

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


?>