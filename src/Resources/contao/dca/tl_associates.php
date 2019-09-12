<?php

$GLOBALS['TL_DCA']['tl_associates'] = [
    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],
    'list' => [
        'sorting' => [
            'mode' => 1,
            'flag' => 1,
            'fields' => ['name'],
        ],
        'label' => [
            'fields' => ['name'],
            'showColumns' => true,
            'format' => '%s',
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_associates']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_associates']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_associates']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_associates']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif',
            ],
        ],
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '{header_legend},name,description,logo,image;{address_legend},street,street_number,zip,city;{services_legend},services;{branches_legend},branches;{languages_legend},languages;',
    ],
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['name'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 255,
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'description' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['description'],
            'search' => true,
            'inputType' => 'textarea',
            'eval' => [
                'rte' => 'tinyMCE',
            ],
            'sql' => "mediumtext NULL",
        ],
        'logo' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['logo'],
            'inputType' => 'fileTree',
            'eval' => [
                'mandatory' => true,
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => Contao\Config::get('validImageTypes'),
                'tl_class' => 'w50',
            ],
            'sql' => "binary(16) NULL",
        ],
        'image' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['image'],
            'inputType' => 'fileTree',
            'eval' => [
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => Contao\Config::get('validImageTypes'),
                'tl_class' => 'w50',
            ],
            'sql' => "binary(16) NULL",
        ],
        'street' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['street'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 50,
                'tl_class' => 'w50',
            ],
            'sql' => "varchar(50) NOT NULL default ''",
        ],
        'street_number' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['street_number'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 10,
                'tl_class' => 'w50',
            ],
            'sql' => "varchar(10) NOT NULL default ''",
        ],
        'zip' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['zip'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'minlength' => 5,
                'maxlength' => 5,
                'rgxp' => 'digit',
                'tl_class' => 'w50 clr',
            ],
            'sql' => "varchar(5) NOT NULL default ''",
        ],
        'city' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['city'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 50,
                'mandatory' => true,
                'rgxp' => 'alpha',
                'tl_class' => 'w50',
            ],
            'sql' => "varchar(50) NOT NULL default ''",
        ],
        'services' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['services'],
            'inputType' => 'checkboxWizard',
            'options_callback' => ['tl_associates', 'getServicesOptions'],
            'sql' => "blob NULL",
        ],
        'branches' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['branches'],
        ],
        'languages' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['languages']['label'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'select',
            'options' => &$GLOBALS['TL_LANG']['tl_associates']['languages']['options'],
            'eval' => [
                'maxlength' => 255,
                'includeBlankOption' => true,
                'multiple' => true,
                'chosen' => true,
                'mandatory' => true,
            ],
            'sql' => "blob NULL",
        ],
    ],
];

class tl_associates {
    public function getServicesOptions(DataContainer $dc) {
        var_dump($dc);
        return [];
    }

    public function getBranchesOptions() {

    }
}
