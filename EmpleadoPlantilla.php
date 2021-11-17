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
            return "Los ingresos de ". $empleado->getNombre() ." son ".$empleado->ingresos();
        }
    }

?>