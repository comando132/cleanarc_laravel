<?php

namespace MyApp\Domain\Models;

interface Domainable
{
    /**
     * @return mixed
     */
    public function toDomain();
}
