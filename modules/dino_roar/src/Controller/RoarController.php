<?php

namespace Drupal\dino_roar\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 *
 * User: habibun
 * Date: 12/31/16
 * Time: 11:29 PM.
 */
class RoarController
{
    /**
     * Return Response.
     *
     * @return Response
     */
    public function roar($count)
    {
        $roar = 'R'.str_repeat('O', $count).'AR!';
        return new Response($roar);
    }
}
