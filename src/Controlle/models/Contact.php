<?php

namespace Controlle\models;

use \Exception;

class Contact
{
    private $name;
    private $email;
    private $phone_number;
    private $website;
    private $notes;
    private $client;
    private $supplier;

    public function __construct()
    {
        $this->client = false;
        $this->supplier = false;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
    
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
        return $this;
    }

    public function validate()
    {
        if (!isset($this->name)) {
            throw new Exception('name is required');
        }

        return true;
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'website' => $this->website,
            'notes' => $this->notes,
            'client' => $this->client,
            'supplier' => $this->supplier
        ];
    }
}