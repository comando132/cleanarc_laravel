<?php

namespace MyApp\Application\UseCases\EditEmployees;

class EditEmployeeRequest {
    protected $employeeNumber;
    protected $firstName;
    protected $lastName;
    protected $extension;
    protected $email;
    protected $officeCode;
    protected $reportsTo;
    protected $jobTitle;

    public function setEmployeeRequest(array $data) :void {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    public function getEmpRequestToArray(): array {
        return [
            'employeeNumber' => $this->getEmployeeNumber(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'extension' => $this->getExtension(),
            'email' => $this->getEmail(),
            'officeCode' => $this->getOfficeCode(),
            'reportsTo' => $this->getReportsTo(),
            'jobTitle' => $this->getJobTitle(),
        ];
    }

    public function setEmployeeNumber(?int $employeeNumber) :void {
        $this->employeeNumber = $employeeNumber;
    }

    public function setFirstName(?string $firstName) :void {
        $this->firstName = $firstName;
    }

    public function setLastName(?string $lastName) :void {
        $this->lastName = $lastName;
    }

    public function setExtension(?string $extension) :void {
        $this->extension = $extension;
    }

    public function setEmail(?string $email) :void {
        $this->email = $email;
    }

    public function setOfficeCode(?string $officeCode) :void {
        $this->officeCode = $officeCode;
    }

    public function setReportsTo(?int $reportsTo) :void {
        $this->reportsTo = $reportsTo;
    }

    public function setJobTitle(?string $jobTitle) :void {
        $this->jobTitle = $jobTitle;
    }

    //getters
    public function getEmployeeNumber() :int {
        return $this->employeeNumber;
    }

    public function getFirstName() :string {
        return $this->firstName;
    }

    public function getLastName() :string {
        return $this->lastName;
    }

    public function getExtension() :string {
        return $this->extension;
    }

    public function getEmail() :string {
        return $this->email;
    }

    public function getOfficeCode() :string {
        return $this->officeCode;
    }

    public function getReportsTo() :int {
        return $this->reportsTo;
    }

    public function getJobTitle() :string {
        return $this->jobTitle;
    }
}
