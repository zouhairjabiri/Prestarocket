<?php 

$sql = array();

// Je ne joue pas la requête de suppression de la colonne pour éviter les erreurs. Il faudra la désinstaller manuellement
$sql[] = "DROP TABLE IF EXISTS `" . _DB_PREFIX_ . "client_review`;";

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}

