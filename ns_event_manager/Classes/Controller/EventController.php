<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Controller;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use NITSAN\NsEventManager\Domain\Repository\EventRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\DataHandling\Model\RecordStateFactory;
use Nitsan\Nsexample\Domain\Repository\ExampleRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\FileRepository;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;
use TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException;
use TYPO3\CMS\Extbase\Persistence\Generic\Exception\UnsupportedMethodException;
use NITSAN\NsT3dev\Event\FrontendRendringEvent;
use Psr\Http\Message\ResponseInterface;
use NITSAN\NsT3dev\Domain\Repository\ProductAreaRepository;
use NITSAN\NsT3dev\Domain\Model\ProductArea;
use NITSAN\NsT3dev\Domain\Model\Log;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\SysLog\Action as SystemLogGenericAction;
use TYPO3\CMS\Core\SysLog\Error as SystemLogErrorClassification;
use TYPO3\CMS\Core\SysLog\Type as SystemLogType;
use TYPO3\CMS\Core\Service\FlexFormService;


/**
 * This file is part of the "EventCrud" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2025 
 */

/**
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * eventRepository
     *
     * @var \NITSAN\NsEventManager\Domain\Repository\EventRepository
     */
    protected $eventRepository = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface
     */
    protected $persistenceManager = null;


    /**
     * action show
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Event $event
     * @return \Psr\Http\Message\ResponseInterface
     */

    public function __construct(
        EventRepository $eventRepository,
        private readonly FlexFormService $flexFormService

    )
    {
        $this->eventRepository = $eventRepository;
        $this->persistenceManager = GeneralUtility::makeInstance(PersistenceManager::class);
      //  $this->flexFormService = $flexFormService;
        //$this->logger = GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__);

    }
    
     private function loadFlexForm($flexFormString): array
    {
        return $this->flexFormService
            ->convertFlexFormContentToArray($flexFormString);
    }

    public function showAction(\NITSAN\NsEventManager\Domain\Model\Event $event = null): \Psr\Http\Message\ResponseInterface
    {   
       // $event = $this->eventRepository->findByUid($eventId);
         // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newEvent, __FILE__ . ' Line No. ' . __LINE__);
        if ($event) {
            $this->view->assign('event', $event);
        }
        return $this->htmlResponse();
    }
     /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    // public function createAction(\NITSAN\NsEventManager\Domain\Model\Event $newEvent)
    // {
    //    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newEvent, __FILE__ . ' Line No. ' . __LINE__);
    //     die;
    //      if ($newEvent->getImage()) {
    //     $fileReference = $newEvent->getImage();
    //     // Log the FileReference object
    //     \TYPO3\CMS\Core\Utility\DebugUtility::var_dump($fileReference);
    //     if ($fileReference instanceof \TYPO3\CMS\Core\Resource\FileReference) {
    //         $fileUrl = $fileReference->getOriginalFile()->getPublicUrl();
    //         \TYPO3\CMS\Core\Utility\DebugUtility::var_dump($fileUrl);
    //     }
    // }
    //     // Optionally, add flash message here
    //     $this->addFlashMessage(
    //     'The object was created. Please be aware that this action is publicly accessible unless you implement an access check.',
    //     '',
    //     \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
    //     );
    //     // Save the event with the image field
    //     $this->eventRepository->add($newEvent);
    //     // Redirect to the list action after successful creation
    //     $this->redirect('list');
    // }
    /**
     * action create
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Event $newEvent
     */
    public function createAction(\NITSAN\NsEventManager\Domain\Model\Event $newEvent)
    {
        try{

            $this->eventRepository->add($newEvent);
            $this->persistenceManager->persistAll();
           //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($_FILES, __FILE__.' Line No. '.__LINE__);die();
            if($_FILES['tx_nseventmanager_nseventcrud']['tmp_name']['image']){
            // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($_FILES['tx_nseventmanager_nseventcrud']['name']['image'], __FILE__.' Line No. '.__LINE__);die();
                $newFile = $this->getUploadedFileData($_FILES['tx_nseventmanager_nseventcrud']['tmp_name']['image'], $_FILES['tx_nseventmanager_nseventcrud']['name']['image']);
                 //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newFile, __FILE__.' Line No. '.__LINE__);die();
                $fileData = $newFile->getProperties();
                if ($fileData) {
                    $this->eventRepository->updateSysFileReferenceRecord(
                        (int)$fileData['uid'],
                        (int)$newEvent->getUid(),
                        (int)$newEvent->getPid(),
                        'tx_nseventmanager_domain_model_event',
                        'image'
                    );
                    $fileRepository = GeneralUtility::makeInstance(FileRepository::class);
                    $fileObjects = $fileRepository->findByRelation(
                        'tx_nseventmanager_domain_model_event',
                        'image',
                        $newEvent->getUid()
                    );
                }
            }
            $this->addFlashMessage('The object was created ', '', AbstractMessage::INFO);
        }catch (IllegalObjectTypeException |  Error $exception){

            $this->logger->error(
                'An error was occurred in insertion operation'.$exception->getMessage()
            );
            $this->addFlashMessage('Some error occurred', '', AbstractMessage::ERROR);

        }

        $this->redirect('list');
        
    }

    /**
     * action edit
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Event $event
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("event")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\NITSAN\NsEventManager\Domain\Model\Event $event): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('event', $event);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Event $event
     */
    public function updateAction(\NITSAN\NsEventManager\Domain\Model\Event $event)
    {
        
         
         if($_FILES['tx_nseventmanager_nseventcrud']['tmp_name']['image']){
            $newFile = $this->getUploadedFileData($_FILES['tx_nseventmanager_nseventcrud']['tmp_name']['image'], $_FILES['tx_nseventmanager_nseventcrud']['name']['image']);
            $fileData = $newFile->getProperties();
            if ($fileData) {
                $this->eventRepository->updateSysFileReferenceRecord(
                    (int)$fileData['uid'],
                    (int)$event->getUid(),
                    (int)$event->getPid(),
                    'tx_nseventmanager_domain_model_event',
                    'image'
                );
                $fileRepository = GeneralUtility::makeInstance(FileRepository::class);
                $fileObjects = $fileRepository->findByRelation(
                    'tx_nseventmanager_domain_model_event',
                    'image',
                    $event->getUid()
                );
            }
        }   

        $this->eventRepository->update($event);
        $this->redirect('list');
    }

     private function getUploadedFileData(string $tmpName, string $fileName): \TYPO3\CMS\Core\Resource\File
    {
        $resourceFactory = GeneralUtility::makeInstance(ResourceFactory::class);
        $storage = $resourceFactory->getDefaultStorage();
        $folderPath = $storage->getRootLevelFolder();
      //  \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($folderPath, __FILE__.' Line No. '.__LINE__);
        $newFile = $storage->addFile($tmpName, $folderPath,$fileName);
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($newFile, __FILE__.' Line No. '.__LINE__);die();
        return $newFile;
    }

    /**
     * action delete
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Event $event
     */
    public function deleteAction(\NITSAN\NsEventManager\Domain\Model\Event $event)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->eventRepository->remove($event);
        $this->redirect('list');
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    { 
 $detailPageId = $this->settings['detailPageId'] ?? null;

    // Fetch events from repository
    $events = $this->eventRepository->findAll();

    // Pass the events and detailPageId to the Fluid template
    $this->view->assignMultiple([
        'events' => $events,
        'detailPageId' => $detailPageId
    ]);

    // Return the response
    return $this->htmlResponse();
    }
    

   
}
