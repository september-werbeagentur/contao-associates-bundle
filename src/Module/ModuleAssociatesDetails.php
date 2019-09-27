<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Module;


use Contao\Module;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesBranchesModel;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesModel;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesServicesModel;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesTypesModel;

class ModuleAssociatesDetails extends Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_associates_details';

    /**
     * Display wildcard in backend
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['SeptemberAssociates'][0]) . ' - ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['associatesdetails'][0]) . ' ###';
            $objTemplate->title = $this->name;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Compile the current element
     */
    protected function compile()
    {
        $associate = AssociatesModel::findByPk(self::getID());
        $associate->image = \FilesModel::findByUuid($associate->image);
        $associate->logo = \FilesModel::findByUuid($associate->logo);

        $types = unserialize($associate->types);
        $services = unserialize($associate->services);
        $branches = unserialize($associate->branches);
        $languages = unserialize($associate->languages);

        $typeNames = [];
        $serviceNames = [];
        $branchNames = [];
        $languageNames = [];

        foreach ($types as $type) {
            $typeNames[] = AssociatesTypesModel::findByPk(intval($type))->name;
        }
        foreach ($services as $service) {
            $serviceNames[] = AssociatesServicesModel::findByPk(intval($service))->name;
        }
        foreach ($branches as $branch) {
            $branchNames[] = AssociatesBranchesModel::findByPk(intval($branch))->name;
        }
        foreach ($languages as $language) {
            $languageNames[] = $GLOBALS['TL_LANG']['MSC']['september_associates']['languageOptions'][$language];
        }

        $associate->types = $typeNames;
        $associate->services = $serviceNames;
        $associate->branches = $branchNames;
        $associate->languages = $languageNames;
        $this->Template->associate = $associate;
    }

    private function getID() {
        return intval(\Input::get('id'));
    }
}