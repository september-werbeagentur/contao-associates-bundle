<?php

use SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesServicesModel;

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
        'default' => '{header_legend},name,description,logo,image;{address_legend},street,street_number,zip,city;{contact_legend},phone,fax,email,homepage;{services_legend},types,services;{branches_legend},branches;{languages_legend},languages;',
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
        'phone' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['phone'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 64,
                'decodeEntities' => true,
                'rgxp' => 'phone',
                'tl_class' => 'w50',
            ],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'fax' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['fax'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 64,
                'decodeEntities' => true,
                'rgxp' => 'phone',
                'tl_class' => 'w50',
            ],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'email' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['email'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'mandatory' => true,
                'decodeEntities' => true,
                'rgxp' => 'email',
                'tl_class' => 'w50 clr',
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'homepage' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['homepage'],
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'decodeEntities' => true,
                'dcaPicker' => true,
                'tl_class' => 'w50 wizard',
                'rgxp' => 'url',
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'types' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['types'],
            'inputType' => 'checkboxWizard',
            'foreignKey' => 'tl_associates_types.name',
            'eval' => [
                'tl_class' => 'w50',
                'multiple' => true,
                'submitOnChange' => true,
            ],
            'sql' => "blob NULL",
        ],
        'services' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['services'],
            'inputType' => 'checkboxWizard',
            'options_callback' => ['tl_associates', 'getServicesOptions'],
            'eval' => [
                'tl_class' => 'w50',
                'multiple' => true,
            ],
            'sql' => "blob NULL",
        ],
        'branches' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['branches'],
            'inputType' => 'checkboxWizard',
            'foreignKey' => 'tl_associates_branches.name',
            'eval' => [
                'tl_class' => 'w50',
                'multiple' => true,
            ],
            'sql' => "blob NULL",
        ],
        'languages' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['languages'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'select',
            'options' => &$GLOBALS['TL_LANG']['MSC']['september_associates']['languageOptions'],
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

class tl_associates extends Contao\Backend
{
    public function getServicesOptions(DataContainer $dc) {
        $types = array_values(unserialize($dc->activeRecord->types));

        if (count($types) === 0) {
            return [];
        }

        $query = "SELECT tl_associates_services.id, tl_associates_services.name FROM tl_associates_services WHERE tl_associates_services.pid IN (" . implode(',', $types) .");";
        $result = Database::getInstance()->prepare($query)->execute();

        $options = [];
        while ($result->next()) {
            $options[$result->id] = $result->name;
        }

        return $options;
    }
}
