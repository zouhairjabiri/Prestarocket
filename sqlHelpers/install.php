<?php 

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'client_review` (
    `id_avis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(50) NOT NULL,
    `contenu` VARCHAR(100),
    `date_ajout` DATE,
    `date_update` DATE,
    PRIMARY KEY  (`id_avis`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';


foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}

