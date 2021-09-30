<?php
namespace MyApp\Infrastructure\Storage\Eloquent\Repositories;

use MyApp\Domain\Models\Domainable;
use MyApp\Domain\Models\Employee\Employee;
use MyApp\Domain\Models\Employee\EmployeeRepository;
use MyApp\Infrastructure\Storage\Eloquent\Models\EloquentEmployee;
use Illuminate\Support\Collection;

class EloquentEmployeeRepository implements EmployeeRepository {
    private $eloquent;

    public function __construct(EloquentEmployee $eloquent) {
        $this->eloquent = $eloquent;
    }

    public function list(): Collection {
        return $this->eloquent->orderBy('employeeNumber')->get()->map(function (Domainable $elo) {
            return $elo->list();
        });
    }

    public function detail(int $id): Employee {
        $emp = $this->eloquent->find($id);
        return $emp->toDomain();
    }

    public function save(Employee $emp): bool {
        $this->eloquent->fill((array)$emp);
        return $this->eloquent->save();
    }

    public function update(Employee $emp):bool {
        $empDb = $this->eloquent->find($emp->getEmployeeNumber());
        $empDb->first_name = $emp->getFirstName();
        $empDb->last_name = $emp->getLastName();
        $empDb->extension = $emp->getExtension();
        $empDb->email = $emp->getEmail();
        $empDb->officeCode = $emp->getOfficeCode();
        $empDb->reportsTo = $emp->getReportsTo();
        $empDb->jobTitle = $emp->getJobTitle();
        return $empDb->save();
    }

}
