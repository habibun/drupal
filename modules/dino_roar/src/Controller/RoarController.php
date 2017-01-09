<?php
/**
 * Created by PhpStorm.
 *
 * User: habibun
 * Date: 12/31/16
 * Time: 11:29 PM.
 */

namespace Drupal\dino_roar\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\dino_roar\Jurassic\RoarGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RoarController.
 */
class RoarController extends ControllerBase
{
    /**
     * @var RoarGenerator
     */
    private $roarGenerator;

    /**
     * @var LoggerChannelFactoryInterface
     */
    private $loggerChannelFactory;

    /**
     * RoarController constructor.
     *
     * @param RoarGenerator                 $roarGenerator
     * @param LoggerChannelFactoryInterface $loggerChannelFactory
     */
    public function __construct(RoarGenerator $roarGenerator, LoggerChannelFactoryInterface $loggerChannelFactory)
    {
        $this->roarGenerator = $roarGenerator;
        $this->loggerChannelFactory = $loggerChannelFactory;
    }

    /**
     * Return Response.
     *
     * @param $count
     *
     * @return Response
     */
    public function roar($count)
    {
        //        $keyValueStore = $this->keyValue('dino');
        $roar = $this->roarGenerator->getRoar($count);
//        $keyValueStore->set('roar_string', $roar);
//        $keyValueStore->get('roar_string');
//        $roar = $keyValueStore->get('roar_string');

        $this->loggerChannelFactory->get('default')
            ->debug($roar);

        return new Response($roar);
    }

    /**
     * @param ContainerInterface $container
     *
     * @return static
     */
    public static function create(ContainerInterface $container)
    {
        $roarGenerator = $container->get('dino_roar.roar_generator');
        $loggerFactory = $container->get('logger.factory');

        return new static($roarGenerator, $loggerFactory);
    }
}
