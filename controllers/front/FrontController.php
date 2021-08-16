<?php
 
class ClientReviewModuleFrontController extends ModuleFrontController
{

     //16.08.2021
    //ToDo Displaying Random review Using Hooks 

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('clientreview.tpl');
    }
}