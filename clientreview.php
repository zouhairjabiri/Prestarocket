<?php 

# Security Issue To check PS Version
if (!defined('_PS_VERSION_')) {
    exit;
}

require_once _PS_MODULE_DIR_ . 'clientreview/autoload.php';


class ClientReview extends Module  
{
    // private $templatefile;
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

        //pop up To cofirm the uninstall
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        $this->ps_versions_compliancy = [
            'min' => '1.7.2.0',
            'max' => _PS_VERSION_
        ];

        // $this->templatefile= 'module:clientreview/views/templates/hook/ClientReview.tpl';
    }



    public function install()
    {
        include(dirname(__FILE__) . '/sqlHelpers/install.php');
       return parent::install() && $this->addTab();
    }

    public function uninstall()
    {
        include(dirname(__FILE__) . '/sqlHelpers/uninstall.php');
        return parent::uninstall();
    }

    //To enable the tab in backend 
 
    public function addTab()
    {
        $tab = new Tab();
        $tab->class_name = $this->name;
        $tab->module = $this->name;
        $tab->id_parent = (int)Tab::getIdFromClassName('DEFAULT');
         $languages = Language::getLanguages();
        foreach ($languages as $lang) {
            $tab->name[$lang['id_lang']] = $this->l('Client Review V1');
        }
        try {
            $tab->save();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
 
        return true;
    }

    public function removeTab()
    {
        $idTab = (int)Tab::getIdFromClassName($this->name);
        if ($idTab) {
            $tab = new Tab($idTab);
            try {
                $tab->delete();
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }
        return true;
    }
}
