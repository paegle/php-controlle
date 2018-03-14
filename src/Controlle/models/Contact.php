<?php

namespace Controlle\models;

use \Exception;

class Contact
{
    const TYPE_CLIENT = 'client';
    const TYPE_SUPPLIER = 'supplier';

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
        $phone_number = preg_replace("/[^0-9]/", "", $phone_number);
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

    public function setType($type)
    {
        if ($type == Contact::TYPE_CLIENT) {
            $this->setClient();
        } else if ($type == Contact::TYPE_SUPPLIER) {
            $this->setSupplier();
        }

        return $this;
    }

    private function setClient()
    {
        $this->client = true;
        return $this;
    }
    
    private function setSupplier()
    {
        $this->supplier = true;
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