<?php
namespace MyApp\Infrastructure\Storage\Eloquent\Models;

use MyApp\Domain\Models\Domainable;
use MyApp\Domain\Models\Employee\Employee;

class EloquentEmployee extends AppEloquent implements Domainable {

    protected $table = 'employees';
    protected $fillable = [
        'lastName', 'firstName', 'extension',
        'email', 'officeCode', 'reportsTo', 'jobTitle'
    ];
    protected $guarded = ['employeeNumber'];
    public $timestamps = false;

    public function toDomain(): Employee {
        $this->employee = new Employee(
            $this->employeeNumber,
            $this->firstName,
            $this->lastName,
            $this->extension,
            $this->email,
            $this->officeCode,
            $this->reportsTo,
            $this->jobTitle
        );
        return $this->employee;
    }

    public function list(): array {
        $this->employee = new Employee(
            $this->employeeNumber,
            $this->firstName,
            $this->lastName,
            $this->extension,
            $this->email,
            $this->officeCode,
            $this->reportsTo,
            $this->jobTitle
        );
        return $this->employee->toArray();
    }
}
