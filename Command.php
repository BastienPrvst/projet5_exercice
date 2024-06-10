<?php

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
        try {
            $db = DBConnect::getPDO();
            $contactManager = new ContactManager($db);
            $contactManager->createContact($name, $email, $phoneNumber);
        }
        catch (Exception $e){
            echo 'Erreur lors de la création du contact !' . $e->getMessage();
            return;
        }

        echo <<<EOT
        
            Le contact au nom de :  $name 
            avec l'email : $email  
            et le téléphone : $phoneNumber 
            à été crée avec succès !
            
            
        EOT;

    }

    public function detail(int $id): void
    {

        $db = DBConnect::getPDO();
        $contactManager = new ContactManager($db);
        $contact = $contactManager->findById($id);


        if ($contact == []){
            echo "Aucun contact correspondant à cet ID\n";
            return;
        }

        echo <<<EOT
            
            Informations du contact correspondant à l'id $id :
            Nom :  $contact[name]
            Email : $contact[email]
            Téléphone : $contact[phone_number] 
            
            
        EOT;

    }


}