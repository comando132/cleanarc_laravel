<?php

namespace MyApp\Application\UseCases\EditEmployees;

use MyApp\Application\UseCases\AddEmployees\AddEmployeeRequest;
use MyApp\Domain\Models\Employee\Employee;
use MyApp\Domain\Models\Employee\EmployeeRepository;

class EditEmployee {
    private $empRepo;
    private $response;

    public function __construct(EmployeeRepository $editRepo) {
        $this->empRepo = $editRepo;
        $this->response = new EditEmployeeResponse();
    }

    public function __invoke(EditEmployeeRequest $request) {
        try {
            // combinar la información anterior y la nueva información
            $newData = $request->getEmpRequestToArray();
            $employee = $this->empRepo->detail($request->getEmployeeNumber());
            $oldData = $employee->toArray();
            $data = array_merge($oldData, $newData);
            $emp = $this->__arrayToEmployee($data);
            unset($newData, $oldData, $data, $employee);
            $this->empRepo->update($emp);
            $this->response->response(true, null, $emp->toArray());
        } catch (\Exception $e) {
            $this->response->response(false, $e->getMessage());
        }
        return $this->response->getArrayResponse();
    }

    /**
     * Método que convierte un EditUserRequest en un modelo de User para guardarlo
     * @param EditEmployeeRequest $empRequest recibe un EditUserRequest
     * @return Employee regresa una instancia de Domain/Models/Employee Employee
     */
    private function __requestToEmployee(EditEmployeeRequest $empRequest): Employee {
        return new Employee(
            $empRequest->getEmployeeNumber(),
            $empRequest->getFirstName(),
            $empRequest->getLastName(),
            $empRequest->getExtension(),
            $empRequest->getEmail(),
            $empRequest->getOfficeCode(),
            $empRequest->getReportsTo(),
            $empRequest->getJobTitle()
        );
    }

    /**
     * Método que convierte un EditUserRequest en un modelo de User para guardarlo
     * @param EditUserRequest $userRequest recibe un EditUserRequest
     * @return User regresa una instancia de Domain/Models/User Usuario
     */
    private function __arrayToEmployee(array $emp): Employee
    {
        return new Employee(
            $emp['employeeNumber'],
            $emp['firstName'],
            $emp['lastName'],
            $emp['extension'],
            $emp['email'],
            $emp['officeCode'],
            $emp['reportsTo'],
            $emp['jobTitle']
        );
    }
}
