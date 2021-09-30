<?php
namespace MyApp\Application\UseCases\AddEmployees;

use MyApp\Application\UseCases\AddEmployee\AddEmployeeResponse;
use MyApp\Application\UseCases\AddEmployee\AddEmployeeRequest;
use MyApp\Domain\Models\Employee\Employee;
use MyApp\Domain\Models\Employee\EmployeeRepository;

class AddEmployee {
    private $empRepo;
    private $response;
    private $request;


    public function __construct(EmployeeRepository $EmployeesRepo) {
        $this->EmployeesRepo = $EmployeesRepo;
        $this->response = new AddEmployeeResponse();
        $this->request = new AddEmployeeRequest();
    }


    public function __invoke(AddEmployeeRequest $request) {
        $Employee = $this->__requestToEmployee($request);
        try {
            $this->EmployeeRepo->save($Employee);
            $this->response->response(true, null, $Employee->toArray());
        } catch (\Exception $e) {
            $this->response->response(false, $e->getMessage());
        }
        return $this->response->getArrayResponse();
    }

    /**
     * Método que convierte un AddEmployeeRequest en un modelo de Employee para guardarlo
     * @param AddEmployeeRequest $EmployeeRequest recibe un AddEmployeeRequest
     * @return Employee regresa una instancia de Domain/Models/Employee Usuario
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
