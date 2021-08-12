<?php
 
 require_once _PS_MODULE_DIR_ . '/clientreview/classes/models/ModelClientReview.php';

class ClientReviewController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;  
        $this->table = ModelClientReview::$definition['table'];  
        $this->identifier = ModelClientReview::$definition['primary'];  
        $this->className = ModelClientReview::class;  
        $this->lang = true;  
 
         
        parent::__construct();
 
         $this->fields_list = [
            'id_avis' => [  
                'title' => $this->module->l('Id'),
                'align' => 'center',
                'class' => 'fixed-width-xs'
            ],
            'titre' => [
                'title' => $this->module->l('titre'),
                'align' => 'left',
            ],
            'contenu' => [
                'title' => $this->module->l('contenu'),
                'align' => 'left',
            ],
             
        ];
 
        $this->addRowAction('edit');
        $this->addRowAction('delete');
    }


    public function renderForm(){ 
        //ToDO
        return parent::renderForm();
    }

    public function initPageHeaderToolbar(){
            //ToDO
        parent::initPageHeaderToolbar();
}


}
