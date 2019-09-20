<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Module;


use Contao\Module;
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
        $this->Template->types = \Input::post('types');
        $this->Template->services = \Input::post('services');
        $this->Template->branches = \Input::post('branches');
        $this->Template->languages = \Input::post('languages');
        $this->Template->associates = AssociatesModel::findByParameters([
            'types' => \Input::post('types'),
        ]);
    }
}