<?php
/**
 * Created by PhpStorm.
 * User: jony
 * Date: 1/3/17
 * Time: 11:35 PM.
 */

namespace Drupal\dino_roar\Jurassic;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

/**
 * Class RoarGenerator.
 */
class RoarGenerator
{
    /**
     * @var KeyValueFactoryInterface
     */
    private $keyValueFactory;

    /**
     * @var bool
     */
    private $useCache;

    /**
     * RoarGenerator constructor.
     *
     * @param KeyValueFactoryInterface $keyValueFactory
     * @param bool                     $useCache
     */
    public function __construct(KeyValueFactoryInterface $keyValueFactory, $useCache)
    {
        $this->keyValueFactory = $keyValueFactory;
        $this->useCache = $useCache;
    }

    /**
     * @param $length
     *
     * @return string
     */
    public function getRoar($length)
    {
        $store = $this->keyValueFactory->get('dino');
        $key = 'roar_'.$length;

        if ($this->useCache && $store->has($key)) {
            return $store->get($key);
        }

        sleep(2);

//        $roar = 'R'.str_repeat('O', $length).'AR!';
        $string = 'R'.str_repeat('O', $length).'AR!';
        if ($this->useCache) {
            $store->set($key, $string);
        }

//        return $roar;
        return $string;
    }
}
