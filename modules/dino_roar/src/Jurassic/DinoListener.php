<?php
/**
 * Created by PhpStorm.
 * User: jony
 * Date: 1/9/17
 * Time: 10:44 PM
 */

namespace Drupal\dino_roar\Jurassic;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class DinoListener implements EventSubscriberInterface
{
    /**
     * @var LoggerChannelFactoryInterface
     */
    private $loggerChannelFactory;

    /**
     * DinoListener constructor.
     * @param LoggerChannelFactoryInterface $loggerChannelFactory
     */
    public function __construct(LoggerChannelFactoryInterface $loggerChannelFactory)
    {
        $this->loggerChannelFactory = $loggerChannelFactory;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $shouldRoar = $request->query->get('roar');

        if ($shouldRoar) {
            $channel = $this->loggerChannelFactory->get('default')
                ->debug('ROOOOOOOOAR');
        }
    }

    /**
     * @return mixed
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

}