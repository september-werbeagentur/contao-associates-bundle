<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['associatesfinder'] = '{title_legend},name,type;{redirect_legend},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['associateslist'] = '{title_legend},name,type;{swa_result_legend},swa_noResult;{redirect_legend},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;';

$GLOBALS['TL_DCA']['tl_module']['fields']['swa_noResult'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_module']['swa_noResult'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [
        'maxlength' => 255,
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];
