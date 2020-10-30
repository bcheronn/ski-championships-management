<?php

namespace Scm\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * class HomepageController
 *
 * @author Bertrand C <66913901+bcheronn@users.noreply.github.com>
 */
class HomepageController // extends AbstractController implements ControllerInterface
{
    /**
     * index function
     *
     * Manage the homepage for the SCM app
     *
     * @param Type $var Description
     * @return Response
     **/
    final public static function index(): Response
    {
        return new Response("Index");
    }
}
