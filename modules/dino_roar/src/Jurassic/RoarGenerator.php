<?php
/**
 * Created by PhpStorm.
 * User: jony
 * Date: 1/3/17
 * Time: 11:35 PM
 */

namespace Drupal\dino_roar\Jurassic;

/**
 * Class RoarGenerator
 * @package Drupal\dino_roar\Jurassic
 */
class RoarGenerator
{
    /**
     * @param $length
     * @return string
     */
    public function getRoar($length)
    {
        $roar = 'R'.str_repeat('O', $length).'AR!';
        return $roar;
    }
}