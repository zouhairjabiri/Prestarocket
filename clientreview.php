<?php 


use PrestaShop\PrestaShop\Core\Module\WidgetInterface;


# Security Issue To check PS Version
if (!defined('_PS_VERSION_')) {
    exit;
}



class ClientReview extends Module  implements WidgetInterface
{
    private $templatefile;
    public function __construct()
    {
        $this->name = 'clientreview';
        $this->author = 'Zouhair';
        $this->version = '1.0';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Client Review', [], 'Modules.ClientReview.Admin');
        $this->description = $this->trans(
            'Module pour afficher des avis client au hasard sur le site web',
            [],
            'Modules.ClientReview.Admin'
        );
        $this->ps_versions_compliancy = [
            'min' => '1.7.2.0',
            'max' => _PS_VERSION_
        ];

        $this->templatefile= 'module:clientreview/views/templates/hook/ClientReview.tpl';
    }



        public function renderWidget($hookName, array $configuration)
        {
            
        } 
        public function getWidgetVariables($hookName, array $configuration)
        {
            
        }
 
}
