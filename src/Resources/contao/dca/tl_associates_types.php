<?php

$GLOBALS['TL_DCA']['tl_associates_types'] = [
    'config' => [
        'dataContainer' => 'Table',
        'ctable' => ['tl_associates_services'],
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
            'fields' => [''],

        ]
    ],
    'operations' => [
        'edit' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates_types']['edit'],
            'href' => 'table=tl_associates_services',
            'icon' => 'edit.gif',
        ],
        'editheader' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates_types']['editheader'],
            'href' => 'act=edit',
            'icon' => 'header.gif',
        ],
        'copy' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates_types']['copy'],
            'href' => 'act=copy',
            'icon' => 'copy.gif',
        ],
        'delete' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates_types']['delete'],
            'href' => 'act=delete',
            'icon' => 'delete.gif',
            'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
        ],
        'show' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates_types']['show'],
            'href' => 'act=show',
            'icon' => 'show.gif',
        ],
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '{header_legend},name',
    ],
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment",
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'name' => [
            'label' => &$GLOBALS['TL_LANG']['tl_associates_types']['name'],
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
    ],
];
