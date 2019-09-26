<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['associatesfinder'] = '{title_legend},name,type;{redirect_legend},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['associateslist'] = '{title_legend},name,type;{swa_result_legend},swa_noResult;{redirect_legend},jumpTo;{swa_distance_matrix_legend},swa_distance_matrix_key;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;';

$GLOBALS['TL_DCA']['tl_module']['fields']['swa_noResult'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['swa_noResult'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [
        'maxlength' => 255,
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_module']['fields']['swa_distance_matrix_key'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['swa_distance_matrix_key'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [
        'maxlength' => 255,
        'mandatory' => true,
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];