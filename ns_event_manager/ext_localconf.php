<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'NsEventManager',
        'Nseventcrud',
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'list, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'create, update, delete'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'NsEventManager',
        'Eventshow',
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'show'
        ],
        // non-cacheable actions
        [
            \NITSAN\NsEventManager\Controller\EventController::class => 'create, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    nseventcrud {
                        iconIdentifier = ns_event_manager-plugin-nseventcrud
                        title = LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_ns_event_manager_nseventcrud.name
                        description = LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_ns_event_manager_nseventcrud.description
                        tt_content_defValues {
                            CType = list
                            list_type = nseventmanager_nseventcrud
                        }
                            
                    }
                    eventshow {
                        iconIdentifier = ns_event_manager-plugin-eventshow
                        title = LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_ns_event_manager_eventshow.name
                        description = LLL:EXT:ns_event_manager/Resources/Private/Language/locallang_db.xlf:tx_ns_event_manager_eventshow.description
                        tt_content_defValues {
                            CType = list
                            list_type = nseventmanager_eventshow
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
