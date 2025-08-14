<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nseventmanager_domain_model_event', 'EXT:ns_event_manager/Resources/Private/Language/locallang_csh_tx_nseventmanager_domain_model_event.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nseventmanager_domain_model_event');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nseventmanager_domain_model_location', 'EXT:ns_event_manager/Resources/Private/Language/locallang_csh_tx_nseventmanager_domain_model_location.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nseventmanager_domain_model_location');
})();
