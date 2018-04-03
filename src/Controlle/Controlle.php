<?php

namespace Controlle;

use \Exception;
use Controlle\models\Contact as ContactModel;
use Controlle\models\Transaction as TransactionModel;
use Controlle\helpers\Config;
use Controlle\helpers\Request;

class Controlle
{
    private $username;
    private $password;
    private $userAgent;
    private $uri;

    public function __construct(array $config = [])
    {   
        try {
            (Config::getInstance())->set($config);
        } catch(Exception $err) {
            throw $err;
        }

        return $this;
    }

    public function fetchContacts()
    {
        try {
            $url = 'contacts';
            return Request::get($url);
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function fetchContactById($id)
    {
        try {
            $url = "contacts/{$id}";
            return Request::get($url);
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function createContact(ContactModel $contact)
    {
        try {
            $url = 'contacts';

            if ($contact->validate()) {
                return Request::post($url, $contact->toArray());   
            }
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function updateContact($id, ContactModel $contact)
    {
        try {
            $url = "contacts/{$id}";

            if ($contact->validate()) {
                return Request::put($url, $contact->toArray());   
            }
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function deleteContact($id)
    {
        try {
            $url = "contacts/{$id}";
            return Request::delete($url);
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function createTransaction(TransactionModel $transaction)
    {
        try {
            $url = 'transactions';

            if ($transaction->validate()) {
                return Request::post($url, $transaction->toArray());
            }
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function updateTransaction($id, TransactionModel $transaction)
    {
        try {
            $url = "transactions/{$id}";

            if ($transaction->validate()) {
                return Request::put($url, $transaction->toArray());
            }
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function deleteTransaction($id)
    {
        try {
            $url = "transactions/{$id}";
            return Request::delete($url);
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function fetchCategories()
    {
        try {
            $url = 'categories';
            return Request::get($url);
        } catch(Exception $err) {
            throw $err;
        }
    }

    public function fetchAccounts()
    {
        try {
            $url = 'accounts';
            return Request::get($url);
        } catch(Exception $err) {
            throw $err;
        }
    }
}