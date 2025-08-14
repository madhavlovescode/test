<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,city,zip_code',
        'iconfile' => 'EXT:ns_event_manager/Resources/Public/Icons/tx_nseventmanager_domain_model_location.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'name, city, zip_code, capacity, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_nseventmanager_domain_model_location',
                'foreign_table_where' => 'AND {#tx_nseventmanager_domain_model_location}.{#pid}=###CURRENT_PID### AND {#tx_nseventmanager_domain_model_location}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.name',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.name.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.city',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.city.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'zip_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.zip_code',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.zip_code.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'capacity' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.capacity',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_location.capacity.description',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        
    
    ],
];
