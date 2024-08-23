<?php

namespace MyBundle\EventListener;

use Pimcore\Model\DataObject\test1;
use Pimcore\Event\Model\DataObjectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Pimcore\Model\Element\ValidationException;

class ObjectSaveListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents() {
        return [
            'primcore.dataobject.preUpdate' => 'onPreUpdate',
        ];
    }

    public function onPreUpdate(DataObjectEvent $event) {
        $object = $event -> getObject();
        if ($object instanceof test1) {
            $textField = $object -> getText();
            if (strpos($textField, 'Вкусно и точка') === false) {
                throw new ValidationException('Текстовое поле должно содержать "Вкусно и точка".');
            }
        }
    }
}
