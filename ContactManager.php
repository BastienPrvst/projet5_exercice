<?php

function findAll(PDO $db): false|array
{
    $getContacts = $db -> query("SELECT * FROM contact");
    return $getContacts->fetchAll(PDO::FETCH_ASSOC);
}

