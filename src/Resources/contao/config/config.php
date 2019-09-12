<?php

// register back end modules
array_insert($GLOBALS['BE_MOD'], 1, [
    'september_associates_header' => [
        'september_associates' => [
            'tables' => ['tl_associates'],
            'table' => ['TableWizard', 'importTable'],
            'list' => ['ListWizard', 'importList'],
        ],
        'september_services' => [
            'tables' => ['tl_associates_types', 'tl_associate_services'],
            'table' => ['TableWizard', 'importTable'],
            'list' => ['ListWizard', 'importList'],
        ],
        'september_branches' => [
            'tables' => ['tl_associates_branches'],
            'table' => ['TableWizard', 'importTable'],
            'list' => ['ListWizard', 'importList'],
        ],
    ]
]);

if (defined('TL_MODE') && TL_MODE == 'BE') {
    $GLOBALS['TL_CSS'][] = 'bundles/contaoassociates/lib/css/be_associates.css|static';
}
