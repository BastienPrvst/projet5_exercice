<?php

require "Contact.php";

class ContactManager
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): false|array
    {
        $getContacts = $this->db -> query("SELECT * FROM contact");

        return array_map(
            function ($contact) {

                return $this->contactToString($this->mapContactFromArray($contact));

            },
            $getContacts->fetchAll(PDO::FETCH_ASSOC)
        );

    }

    private function contactToString(Contact $contact) : string
    {
        $i = [
            "id" => $contact->getId(),
            "name" => $contact->getName(),
            "email" => $contact->getEmail(),
            "phoneNumber" => $contact->getPhoneNumber(),
        ];

        return sprintf("{%s}, %s, %s, %s",$i['id'], $i['name'], $i['email'], $i['phoneNumber']);
    }

    private function mapContactFromArray(array $data): Contact
    {
        return new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
    }

}