<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class FormularioEmpleadoViewModel extends ViewModel
{
    public $employee;
    public $chiefs;
    public $offices;
    
    public function __construct($employee, $chiefs, $offices)
    {
        $this->employee = $employee;
        $this->chiefs = $chiefs;
        $this->offices = $offices;
    }

    public function employee(){
        return $this->employee;
    }

    public function chiefs(){
        return $this->chiefs;
    }

    public function offices(){
        return $this->offices;
    }
}
