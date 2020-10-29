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
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return new Response("OK", 200);
    }
}
