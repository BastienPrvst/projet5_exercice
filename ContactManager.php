<?php

use App\Class\Contact;

require 'Contact.php';


class ContactManager
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): array
    {
        $getContacts = $this->db->query("SELECT * FROM contact");

        return array_map(
            function ($contact) {

                return $this->mapContactFromArray($contact);

            },
            $getContacts->fetchAll(PDO::FETCH_ASSOC)
        );

    }

    private function mapContactFromArray(array $data): Contact
    {
        return new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
    }

    private function getLastID() : int
    {
        $lastId = $this->db -> query("SELECT id FROM contact ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

        return intval($lastId['id']);

    }

    public function createContact(?string $name, ?string $mail, ?string $phoneNumber): void
    {
        $addUser = $this->db->prepare("INSERT INTO contact (name, email, phone_number) VALUES (?,?,?)");

        $addUser->execute([
            $name,
            $mail,
            $phoneNumber
        ]);
    }

    public function findById(int $id): false|array
    {
        $getContact = $this->db->prepare("SELECT * FROM contact WHERE id = ?");

        $getContact->execute([$id]);

        return $getContact->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteContactById(int $id): void
    {
        $deleteContact = $this->db->prepare("DELETE FROM contact WHERE id = ?");

        $deleteContact->execute([$id]);

    }


}