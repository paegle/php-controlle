<?php

namespace Controlle\models;

use \Exception;
use \DateTime;

class Transaction
{
    private $description;
    private $notes;
    private $date;
    private $amount_cents;
    private $amount;
    private $installment;
    private $total_installments;
    private $account_id;
    private $category_id;
    private $activity_type;
    private $paid;
    private $contact_id;

    public function __construct()
    {
        $this->date = new DateTime();
        $this->installment = 1;
        $this->total_installments = 1;
        $this->amount_cents = 0;
        $this->amount = 0;
        $this->activity_type = 1; // 0 - Despesa 1 - Receita
        $this->paid = false;

        return $this;
    }

    public function isExpense()
    {
        $this->setActivityType(0);
        return $this;
    }

    public function isRecipe()
    {
        $this->setActivityType(1);
        return $this;
    }

    private function setActivityType($activity_type)
    {
        $this->activity_type = $activity_type;
        $this->setAmountCents($this->amount_cents);
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    public function setDate(DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    private function setAmountCents($amount)
    {
        $this->amount_cents = $amount * 100;
        return $this;
    }

    public function setAmount($amount)
    {
        if ($this->activity_type == 0) {
            $amount = $amount * -1;
        }

        $this->amount = $amount;
        $this->setAmountCents($amount);

        return $this;
    }

    public function setInstallment($installment)
    {
        $this->installment = $installment;
        return $this;
    }

    public function setTotalInstallments($total_installments)
    {
        $this->total_installments = $total_installments;
        return $this;
    }

    public function setAccountId($account_id)
    {
        $this->account_id = $account_id;
        return $this;
    }
    
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function setPaid(bool $paid)
    {
        $this->paid = $paid;
        return $this;
    }

    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
        return $this;
    }

    public function validate()
    {
        if (!isset($this->description)) {
            throw new Exception('description is required');
        }

        if (!isset($this->amount_cents)) {
            throw new Exception('amount_cents is required');
        }

        if (!isset($this->account_id)) {
            throw new Exception('account_id is required');
        }

        if (!isset($this->category_id)) {
            throw new Exception('category_id is required');
        }

        return true;
    }

    public function toArray()
    {
        $toArray = [
            'description' => $this->description,
            'date' => $this->date->format('Y-m-d'),
            'amount_cents' => (string) $this->amount_cents,
            'amount' => (string) $this->amount,
            'installment' => $this->installment,
            'total_installments' => $this->total_installments,
            'account_id' => $this->account_id,
            'category_id' => $this->category_id,
            'paid' => $this->paid,
            'contact_id' => $this->contact_id
        ];

        if (isset($this->notes)) {
            $toArray['notes'] = $this->notes;
        }

        return $toArray;
    }
}