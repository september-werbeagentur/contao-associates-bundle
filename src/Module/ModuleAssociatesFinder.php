<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Module;


use Contao\Module;
use Contao\PageModel;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesBranchesModel;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesServicesModel;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesTypesModel;

class ModuleAssociatesFinder extends Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_associates_finder';

    /**
     * Display wildcard in backend
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['SeptemberAssociates'][0]) . ' - ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['associatesfinder'][0]) . ' ###';
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
        $this->Template->id = $this->id;
        $this->Template->types = AssociatesTypesModel::findAll();
        $this->Template->services = AssociatesServicesModel::findAll();
        $this->Template->branches = AssociatesBranchesModel::findAll();
        $this->Template->languages = $GLOBALS['TL_LANG']['MSC']['september_associates']['languageOptions'];
        $this->Template->radiusOptions = $GLOBALS['TL_LANG']['MSC']['september_associates']['radiusOptions'];
        $this->Template->submitButton = $GLOBALS['TL_LANG']['MSC']['september_associates']['search'];
        $jumpTo = PageModel::findByPk((int)$this->jumpTo);
        $this->Template->jumpTo = ampersand($jumpTo->getFrontendUrl());
    }
}