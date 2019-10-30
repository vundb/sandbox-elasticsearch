<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    /**
     * @Route("/", name="hello_world")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Hello World!'
        ]);
    }
}
