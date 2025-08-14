<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event',
        'label' => 'title',
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
        'searchFields' => 'title,description,organizer_name,mode',
        'iconfile' => 'EXT:ns_event_manager/Resources/Public/Icons/tx_nseventmanager_domain_model_event.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, organizer_name, mode, location, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
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
                'foreign_table' => 'tx_nseventmanager_domain_model_event',
                'foreign_table_where' => 'AND {#tx_nseventmanager_domain_model_event}.{#pid}=###CURRENT_PID### AND {#tx_nseventmanager_domain_model_event}.{#sys_language_uid} IN (-1,0)',
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

        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.title',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.description',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.description.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'organizer_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.organizer_name',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.organizer_name.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'mode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'mode22' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode22',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.mode22.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'location' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.location',
            'description' => 'LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.location.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_nseventmanager_domain_model_location',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ],

         'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:nsexample/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image',
            'description' => 'LLL:EXT:nsexample/Resources/Private/Language/locallang_db.xlf:tx_nseventmanager_domain_model_event.image.description',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'image',
                        'tablenames' => 'tx_nseventmanager_domain_model_event',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ]
            ),
            
        ],
    
    ],
];
