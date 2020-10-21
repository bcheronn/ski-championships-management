<?php

declare(strict_types=1);

namespace Scm\Controller;

final class HomeController extends ManagerController
{

    public function homePage($request, $response): void
    {
        echo $this->twig->render('home.html.twig', ['newUser' => false]);
    }

    public function errorPage($error): void
    {
        echo $this->twig->render('error.html.twig', ['error' => $error]);
    }
}
