<?php
namespace MyApp\Application\UseCases\AddEmployees;

use MyApp\Domain\Models\Employee\Employee;
use MyApp\Domain\Models\Employee\EmployeeRepository;

class AddEmployee {
    private $employeeRepo;
    private $response;
    private $request;


    public function __construct(EmployeeRepository $EmployeesRepo) {
        $this->employeeRepo = $EmployeesRepo;
        $this->response = new AddEmployeeResponse();
        $this->request = new AddEmployeeRequest();
    }


    public function __invoke(AddEmployeeRequest $request) {
        $employee = $this->__requestToEmployee($request);
        try {
            $this->employeeRepo->save($employee);
            $this->response->response(true, null, $employee->toArray());
        } catch (\Exception $e) {
            dd($e->getMessage());
            $this->response->response(false, $e->getMessage());
        }
        return $this->response->getArrayResponse();
    }

    /**
     * Método que convierte un AddEmployeeRequest en un modelo de Employee para guardarlo
     * @param AddEmployeeRequest $EmployeeRequest recibe un AddEmployeeRequest
     * @return Employee regresa una instancia de Domain/Models/Employee Employee
     */
    private function __requestToEmployee(AddEmployeeRequest $EmployeeRequest): Employee {
        return new Employee(
            null,
            $EmployeeRequest->getFirstName(),
            $EmployeeRequest->getLastName(),
            $EmployeeRequest->getExtension(),
            $EmployeeRequest->getEmail(),
            $EmployeeRequest->getOfficeCode(),
            $EmployeeRequest->getReportsTo(),
            $EmployeeRequest->getJobTitle()
        );
    }


}
