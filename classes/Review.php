<?php


// Doc https://devdocs.prestashop.com/1.7/development/components/database/objectmodel/

class Review extends ObjectModel
{
    public $id_avis;
    public $titre;
    public $contenu;
    public $date_update;
    public $date_ajout;
 
    public static $definition = [
        'table'     => 'client_review',
        'primary'   => 'id_avis',
        'multilang' => false,
        'fields'    => [
            'id_avis'        => ['type' => self::TYPE_INT,   'validate' => 'isInt'],
            'titre'          => ['type' => self::TYPE_STRING,  'required' => true],
            'contenu'        => ['type' => self::TYPE_STRING,  'required' => true],
            'date_update'    => ['type' => self::TYPE_DATE,  'required' => false],
            'date_ajout'     => ['type' => self::TYPE_DATE,  'required' => false],
        ],
    ];

 
}
