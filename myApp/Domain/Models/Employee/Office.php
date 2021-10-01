<?php

namespace MyApp\Domain\Models\Employee;

final class Office
{

    public $officeCode;
    public $city;
    public $phone;
    public $addressLine1;
    public $addressLine2;
    public $state;
    public $country;
    public $postalCode;
    public $territory;

    public function __construct(
        string $officeCode,
        string $city,
        string $phone,
        string $addressLine1,
        ?string $addressLine2,
        ?string $state,
        string $country,
        string $postalCode,
        string $territory
    ) {
        $this->setOfficeCode($officeCode);
        $this->setCity($city);
        $this->setPhone($phone);
        $this->setAddressLine1($addressLine1);
        $this->setAddressLine2($addressLine2);
        $this->setState($state);
        $this->setCountry($country);
        $this->setPostalCode($postalCode);
        $this->setTerritory($territory);
    }

    /**
     * Get the value of officeCode
     */ 
    public function getOfficeCode()
    {
        return $this->officeCode;
    }

    /**
     * Set the value of officeCode
     *
     * @return  self
     */ 
    public function setOfficeCode($officeCode)
    {
        $this->officeCode = $officeCode;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of addressLine1
     */ 
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * Set the value of addressLine1
     *
     * @return  self
     */ 
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * Get the value of addressLine2
     */ 
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * Set the value of addressLine2
     *
     * @return  self
     */ 
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of postalCode
     */ 
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set the value of postalCode
     *
     * @return  self
     */ 
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

        /**
         * Get the value of territory
         */ 
        public function getTerritory()
        {
                return $this->territory;
        }

        /**
         * Set the value of territory
         *
         * @return  self
         */ 
        public function setTerritory($territory)
        {
                $this->territory = $territory;

                return $this;
        }

        public function toArray(): array{
            return [
                'officeCode' => $this->officeCode,
                'city' => $this->city,
                'phone' => $this->phone,
                'addressLine1' => $this->addressLine1,
                'addressLine2' => $this->addressLine2,
                'state' => $this->state,
                'country' => $this->country,
                'postalCode' => $this->postalCode,
                'territory' => $this->territory
            ];
        }
}
