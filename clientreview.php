<?php 

# Security Issue To check PS Version
if (!defined('_PS_VERSION_')) {
    exit;
}

//  require_once _PS_MODULE_DIR_ . 'clientreview/autoload.php';
require_once _PS_MODULE_DIR_ . '/clientreview/classes/Review.php';

class ClientReview extends Module  
{
     private $templatefile;
    public function __construct()
    {
        $this->name = 'clientreview';
        $this->author = 'Zouhair';
        $this->tab = 'Avis Clients';
        $this->need_instance = 0;
        $this->version = '1.0';
        $this->bootstrap = true;

        parent::__construct();

        
        $this->displayName = $this->l('Gestion des avis clients');
        $this->description = $this->l('Module pour afficher des avis client au hasard sur le site web');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        $this->ps_versions_compliancy = [
            'min' => '1.7.2.0',
            'max' => _PS_VERSION_
        ];

        $this->templatefile= 'module:clientreview/views/templates/front/clientreview.tpl';


     }



    public function install()
    {
       include(dirname(__FILE__) . '/sqlHelpers/install.php');
       return parent::install() && $this->addTab() && $this->registerHook('displayHome');
    }

    public function uninstall()
    {
        include(dirname(__FILE__) . '/sqlHelpers/uninstall.php');
        return parent::uninstall()&& $this->removeTab();
    }

    //To enable the tab in backend 
 
    public function addTab()
    {
        $tab = new Tab();
        $tab->class_name = 'AdminClientReview';
        $tab->module = $this->name;
        $tab->id_parent = (int)Tab::getIdFromClassName('DEFAULT');
        $languages = Language::getLanguages();

        foreach ($languages as $lang) {
            $tab->name[$lang['id_lang']] = $this->l($this->tab);
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
        $idTab = (int)Tab::getIdFromClassName('AdminClientReview');
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

    public function hookDisplayHome($params){
        $sql = 'SELECT  * FROM `' . _DB_PREFIX_ . 'client_review` ORDER BY RAND() LIMIT 1';
        $result = Db::getInstance()->executeS($sql);
   

        //Debug Error
        //Db::getInstance()->execute("INSERT INTO `"._DB_PREFIX_."message` (`id_cart`, `id_employee`, `id_order`, `message`, `private`, `date_add`) VALUES (8, 0, 0, 'founded', 0, NOW())");


        if (!empty($result)) {

            $this->context->smarty->assign(
                array(
                    'result' => $result,
                    'exist' => 'Y'
                )
            );   

        }else{
            $result = [];
            $this->context->smarty->assign(
                array(
                    'result' => $result,
                    'exist' => 'N'
             
                )
            );        }




        return $this->fetch($this->templatefile);
    }
}
