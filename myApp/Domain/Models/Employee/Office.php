<?php

namespace MyApp\Domain\Models\Employee;

final class Office
{

    public $officeCode;
    public $city;
    public $phone;
    public $addressline1;
    public $addressline2;
    public $state;
    public $country;
    public $postalcode;
    public $territory;

    public function __construct(
        string $officeCode,
        string $city,
        string $phone,
        string $addressline1,
        ?string $addressline2,
        ?string $state,
        string $country,
        string $postalcode,
        string $territory
    ) {
        $this->setOfficeCode($officeCode);
        $this->setCity($city);
        $this->setPhone($phone);
        $this->setAddressline1($addressline1);
        $this->setAddressline2($addressline2);
        $this->setState($state);
        $this->setCountry($country);
        $this->setPostalcode($postalcode);
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
     * Get the value of addressline1
     */ 
    public function getAddressline1()
    {
        return $this->addressline1;
    }

    /**
     * Set the value of addressline1
     *
     * @return  self
     */ 
    public function setAddressline1($addressline1)
    {
        $this->addressline1 = $addressline1;

        return $this;
    }

    /**
     * Get the value of addressline2
     */ 
    public function getAddressline2()
    {
        return $this->addressline2;
    }

    /**
     * Set the value of addressline2
     *
     * @return  self
     */ 
    public function setAddressline2($addressline2)
    {
        $this->addressline2 = $addressline2;

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
     * Get the value of postalcode
     */ 
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set the value of postalcode
     *
     * @return  self
     */ 
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

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
                'addressline1' => $this->addressline1,
                'addressline2' => $this->addressline2,
                'state' => $this->state,
                'country' => $this->country,
                'postalcode' => $this->postalcode,
                'territory' => $this->territory
            ];
        }
}
