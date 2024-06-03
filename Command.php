<?php

use App\Class\DBConnect;

require_once "DBConnect.php";
require_once "ContactManager.php";

class Command
{

    public function list(): array
    {
        $db = DBConnect::getPDO();
        $contactManager = new ContactManager($db);
        return $contactManager->findAll();
    }

    public function create(?string $name, ?string $email, ?string $phoneNumber): void
    {
        $db = DBConnect::getPDO();
        $contactManager = new ContactManager($db);
        $contactManager->createContact($name, $email, $phoneNumber);
    }
}