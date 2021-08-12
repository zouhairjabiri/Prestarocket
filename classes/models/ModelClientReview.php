<?php

class ModelClientReview extends ObjectModel
{
    public $id_avis;
    public $titre;
    public $contenu;
    public $date_update;
    public $date_ajout;
 
    public static $definition = [
        'table'     => 'client_review',
        'primary'   => 'id_avis',
        'multilang' => true,
        'fields'    => [
            'id_avis'        => ['type' => self::TYPE_INT, 'validate' => 'isInt'],
            'titre'          => ['type' => self::TYPE_STRING, 'db_type' => 'varchar(255)', 'lang' => false],
            'contenu'        => ['type' => self::TYPE_STRING, 'db_type' => 'varchar(255)', 'lang' => false],
            'date_update'    => ['type' => self::TYPE_DATE, 'db_type' => 'DATE', 'lang' => false],
            'date_ajout'     => ['type' => self::TYPE_DATE, 'db_type' => 'DATE', 'lang' => false],
        ],
    ];

    public function add($autoDate = true, $nullValues = true)
    {
        return parent::add($autoDate, $nullValues);
    }

    public function delete()
    {
        return parent::delete();
    }
}
