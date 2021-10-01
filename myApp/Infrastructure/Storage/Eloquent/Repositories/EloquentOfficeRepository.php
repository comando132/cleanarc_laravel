<?php
namespace MyApp\Infrastructure\Storage\Eloquent\Repositories;

use MyApp\Domain\Models\Domainable;
use MyApp\Domain\Models\Employee\Office;
use MyApp\Domain\Models\Employee\OfficeRepository;
use MyApp\Infrastructure\Storage\Eloquent\Models\EloquentOffice;
use Illuminate\Support\Collection;

class EloquentOfficeRepository implements OfficeRepository {
    private $eloquent;

    public function __construct(EloquentOffice $eloquent) {
        $this->eloquent = $eloquent;
    }

    public function list(): Collection {
        return $this->eloquent->orderBy('officeCode')->get()->map(function (Domainable $elo) {
            return $elo->list();
        });
    }
}
