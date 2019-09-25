<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Module;


use Contao\Module;
use Contao\PageModel;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesModel;

class ModuleAssociatesList extends Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_associates_list';

    /**
     * Display wildcard in backend
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['SeptemberAssociates'][0]) . ' - ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['associateslist'][0]) . ' ###';
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
        $this->fetchPostData();

        $this->Template->types = $this->types;
        $this->Template->services = $this->services;
        $this->Template->branches = $this->branches;
        $this->Template->languages = $this->languages;
        $this->Template->associates = AssociatesModel::findAssociatesBy([
            'types' => $this->types,
            'services' => $this->services,
            'languages' => $this->languages,
            'branches' => $this->branches
        ]);
        $jumpTo = PageModel::findByPk((int)$this->jumpTo);
        $this->Template->jumpTo = ampersand($jumpTo->getFrontendUrl());
        $this->Template->noResult = $this->swa_noResult;
        $this->Template->noResult_default = $GLOBALS['TL_LANG']['tl_module']['swa_noResult_default'];
    }

    protected function fetchPostData() {
        $this->types = \Input::post('types');
        $this->services = \Input::post('services');
        $this->branches = \Input::post('branches');
        $this->languages = \Input::post('languages');
    }
}