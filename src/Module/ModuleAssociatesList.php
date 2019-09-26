<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Module;


use Contao\Module;
use Contao\PageModel;
use Contao\System;
use Patchwork\Utf8;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Helper\DistanceMatrixAPIHelper;
use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesModel;

class ModuleAssociatesList extends Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_associates_list';

    private $associates;
    private $types;
    private $services;
    private $branches;
    private $languages;
    private $originAddress;
    private $radius;

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
        $this->associates = AssociatesModel::findAssociatesBy([
            'types' => $this->types,
            'services' => $this->services,
            'languages' => $this->languages,
            'branches' => $this->branches
        ]);

        if (isset($this->originAddress)
            && $this->originAddress !== ''
            && isset($this->radius)
            && isset($this->swa_distance_matrix_key)
            && $this->swa_distance_matrix_key !== ''
        ) {
            $this->associates = $this->getAssociatesWithinRadius($this->associates, $this->originAddress, $this->radius);
        }
        $this->Template->associates = $this->associates;
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
        $this->originAddress = \Input::post('originAddress');
        $this->radius = intval(\Input::post('radius'));
    }

    private function getAssociatesWithinRadius($associates, $address, $radius) {
        $origins = [];
        $destinations = [];

        foreach ($associates as $associate) {
            $origins[] = $this->originAddress;
            $destinations[] = $associate->street . ' ' . $associate->street_number . ', ' . $associate->zip . ' ' . $associate->city;
        }

        $this->Template->DMAQuery = DistanceMatrixAPIHelper::fetchDMAQuery(
            DistanceMatrixAPIHelper::buildDMAQueryString($origins, $destinations, $this->swa_distance_matrix_key)
        );
    }
}