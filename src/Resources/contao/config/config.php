<?php

// register backend modules
array_insert($GLOBALS['BE_MOD'], 1, [
    'september_associates_header' => [
        'september_associates' => [
            'tables' => ['tl_associates'],
            'table' => ['TableWizard', 'importTable'],
            'list' => ['ListWizard', 'importList'],
        ],
        'september_types' => [
            'tables' => ['tl_associates_types', 'tl_associates_services'],
            'table' => ['TableWizard', 'importTable'],
            'list' => ['ListWizard', 'importList'],
        ],
        'september_branches' => [
            'tables' => ['tl_associates_branches'],
            'table' => ['TableWizard', 'importTable'],
            'list' => ['ListWizard', 'importList'],
        ],
    ],
]);

// register frontend modules
array_insert($GLOBALS['FE_MOD'], 3, [
    'SeptemberAssociates' => [
        'associatesfinder' => 'SeptemberWerbeagentur\ContaoAssociatesBundle\Module\ModuleAssociatesFinder',
        'associateslist' => 'SeptemberWerbeagentur\ContaoAssociatesBundle\Module\ModuleAssociatesList',
    ],
]);

if (defined('TL_MODE') && TL_MODE == 'BE') {
    $GLOBALS['TL_CSS'][] = 'bundles/contaoassociates/lib/css/be_associates.css|static';
}

if (defined('TL_MODE') && TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'bundles/contaoassociates/lib/css/fe_associates.css|static';
    $GLOBALS['TL_HEAD'][] = '<script defer src="/bundles/contaoassociates/lib/js/associates.js"></script>';
}

$GLOBALS['TL_MODELS']['tl_associates'] = 'SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesModel';
$GLOBALS['TL_MODELS']['tl_associates_types'] = 'SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesTypesModel';
$GLOBALS['TL_MODELS']['tl_associates_services'] = 'SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesServicesModel';
$GLOBALS['TL_MODELS']['tl_associates_branches'] = 'SeptemberWerbeagentur\ContaoAssociatesBundle\Model\AssociatesBranchesModel';
