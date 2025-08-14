<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'NsEventManager',
    'Nseventcrud',
    'EventCrud'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'NsEventManager',
    'Eventshow',
    'Eventshow'
);

// plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
$pluginSignature =  str_replace('_', '', 'ns_event_manager') . '_nseventcrud';
 //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pluginSignature, __FILE__.' Line No. '.__LINE__);die();
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    // FlexForm configuration schema file 

    'FILE:EXT:ns_event_manager/Configuration/FlexForms/flexform.xml'
);

$pluginSignature2 =  str_replace('_', '', 'ns_event_manager') . '_eventshow';
 //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($pluginSignature, __FILE__.' Line No. '.__LINE__);die();

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature2] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature2,
    // FlexForm configuration schema file
    
    'FILE:EXT:ns_event_manager/Configuration/FlexForms/flexformShow.xml'
);
