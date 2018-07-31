<?php
/**
 * Created by PhpStorm.
 * User: coralie
 * Date: 12/06/18
 * Time: 16:21
 */

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Event\FilterUserResponseEvent;

class RegistrationListener
{
    public function onKernelResponse(FilterUserResponseEvent $event)
    {
        $event->stopPropagation();
    }
}