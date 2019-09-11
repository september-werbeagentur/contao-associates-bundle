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
        ]
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
    'palettes' => [
        '__selector__' => [],
        'default' => '{header_legend},name;{languages_legend},languages;',
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
        'languages' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates']['languages'],
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'select',
            'options' => [
                'english',
                'french',
                'latin',
                'polish',
                'romansh',
                'russian',
                'spanish'
            ],
            'reference' => &$GLOBALS['TL_LANG']['tl_associates']['languages']['options'],
            'eval' => [
                'maxlength' => 255,
                'includeBlankOption' => true,
                'multiple' => true,
                'chosen' => true,
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
    ],
];
