<?php

namespace MyBundle\EventListener;

use Pimcore\Model\DataObject\test1;
use Pimcore\Event\Model\DataObjectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ObjectCreateListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents() {
        return [
            'pimcore.dataobject.preAdd' => 'onPreAdd',
        ];
    }

    public function onPreAdd(DataObjectEvent $event) {
        $object = $event -> getObject();
        if ($object instanceof test1) {
            $object->setNum1(rand(1,100));
            $object->setNum2(rand(100,200));
        }
    }
}
