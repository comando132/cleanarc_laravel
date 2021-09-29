<?php
namespace MyApp\Domain\Models\Employee;

interface EmployeeRepository {
    public function list();

    public function detail(int $id): Employee;

    public function save(Employee $emp): bool;

    public function update(Employee $emp): bool;

}
