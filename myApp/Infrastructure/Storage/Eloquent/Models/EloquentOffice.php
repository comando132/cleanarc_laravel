<?php
namespace MyApp\Infrastructure\Storage\Eloquent\Models;

use MyApp\Domain\Models\Domainable;
use MyApp\Domain\Models\Employee\Office;

class EloquentOffice extends AppEloquent implements Domainable {

    protected $table = 'offices';
    protected $primaryKey = 'officeCode';
    public $timestamps = false;

    public function toDomain(): Office {
        $this->office = new Office(
            $this->officeCode,
            $this->city,
            $this->phone,
            $this->addressLine1,
            $this->addressLine2,
            $this->state,
            $this->country,
            $this->postalCode,
            $this->territory
        );
        return $this->office;
    }

    public function list(): array {
        $this->office = new Office(
            $this->officeCode,
            $this->city,
            $this->phone,
            $this->addressLine1,
            $this->addressLine2,
            $this->state,
            $this->country,
            $this->postalCode,
            $this->territory
        );
        return $this->office->toArray();
    }
}
