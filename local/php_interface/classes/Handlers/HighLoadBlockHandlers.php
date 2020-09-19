<?php

namespace App\Handlers;

use Bitrix\Main\EventManager;
use \Bitrix\Main\Entity\Event;

class HighLoadBlockHandlers
{
    public static function OnAfterAdd(Event $event)
    {
        $id = $event->getParameter('id');

        $eventLog = new \CEventLog;

        $eventLog->Add([
            'SEVERITY' => 'INFO',
            'AUDIT_TYPE_ID' => 'OnAfterAddElement',
            'MODULE_ID' => 'highloadblock',
            'DESCRIPTION' => 'Добавили новый эелемент с айди - '.$id,
        ]);
    }

    public static function OnAfterUpdate(Event $event)
    {
        $id = $event->getParameter('id');
        $id = $id['ID'];

        $eventLog = new \CEventLog;

        $eventLog->Add([
            'SEVERITY' => 'INFO',
            'AUDIT_TYPE_ID' => 'OnAfterUpdateElement',
            'MODULE_ID' => 'highloadblock',
            'DESCRIPTION' => 'Изменили эелемент с айди - '.$id,
        ]);
    }

    public static function OnBeforeDelete(Event $event)
    {
        $id = $event->getParameter('id');
        $id = $id['ID'];

        $eventLog = new \CEventLog;

        $eventLog->Add([
            'SEVERITY' => 'INFO',
            'AUDIT_TYPE_ID' => 'OnBeforeDeleteElement',
            'MODULE_ID' => 'highloadblock',
            'DESCRIPTION' => 'Удалили эелемент с айди - '.$id,
        ]);
    }

    public static function initHandlers()
    {
        $eventManager = EventManager::getInstance();

        $eventManager->addEventHandler('', 'ColorOnAfterAdd', [self::class, 'OnAfterAdd']);
        $eventManager->addEventHandler('', 'ColorOnAfterUpdate', [self::class, 'OnAfterUpdate']);
        $eventManager->addEventHandler('', 'ColorOnBeforeDelete', [self::class, 'OnBeforeDelete']);
    }
}

