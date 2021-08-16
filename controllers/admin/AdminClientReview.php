<?php
 
 require_once _PS_MODULE_DIR_ . '/clientreview/classes/Review.php';

class AdminClientReviewController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;  
        $this->table = Review::$definition['table'];  
        $this->identifier = Review::$definition['primary'];  
        $this->className = Review::class;  
        $this->lang = false;  
 
         
        parent::__construct();
 
         $this->fields_list = [
            'id_avis' => [  
                'title' => $this->module->l('Id'),
                'align' => 'center',
                'class' => 'fixed-width-xs'
            ]
            ,
            'titre' => [
                'title' => $this->module->l('titre'),
                'align' => 'left',
            ]
            ,
            'contenu' => [
                'title' => $this->module->l('contenu'),
                'align' => 'left',
            ]
             
        ];
 
        $this->addRowAction('edit');
        $this->addRowAction('delete');
    }


    public function renderForm()
    {
         $this->fields_form = [
             'legend' => [
                'title' => $this->module->l('Avis Client'),
                'icon' => 'icon-cog'
            ],
             'input' => [
                [
                    'type' => 'text',  
                    'label' => $this->module->l('titre'),  
                    'name' => 'titre',  
                    'class' => 'input fixed-width-sm',  
                    'size' => 50,  
                    'required' => true,  
                    'empty_message' => $this->l('veuillez remplir ce champ'),  
                    'hint' => $this->module->l('titre')  
                ],
                [
                    'type' => 'textarea',
                    'label' => $this->module->l('contenu'),
                    'name' => 'contenu',
                    'required' => true,  
                    'lang' => false,
                    'autoload_rte' => true,  
                ],

                // [
                //     'type' => 'hidden',
                //     'label' => $this->module->l('date_ajout'),
                //     'name' => 'date_ajout',
                //     'lang' => false,
                //  ], [
                //     'type' => 'hidden',
                //     'label' => $this->module->l('date_update'),
                //     'name' => 'date_update',
                //     'lang' => false,
                  
                // ],
            ],
             'submit' => [
                'title' => $this->l('Save'),  
            ]
        ];
        return parent::renderForm();
    }



    // ref : https://www.prestashop.com/forums/topic/1015709-get-boxes-click-button-initpageheadertoolbar/
    public function initPageHeaderToolbar()
    {
         $this->page_header_toolbar_btn['new'] = array(
            'href' => self::$currentIndex . '&add' . $this->table . '&token=' . $this->token,
            'desc' => $this->module->l('Add new review'),
            'icon' => 'process-icon-new'
        );

        parent::initPageHeaderToolbar();
    }


}
