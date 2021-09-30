<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class EmpleadosViewModel extends ViewModel
{
    public $employees;
    
    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function employees(){
        return $this->employees;
    }
}
