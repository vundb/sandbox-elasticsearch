<?php

namespace App\Controller;

use App\Entity\SuperHero;
use App\SearchRepository\SuperHeroRepository;
use FOS\ElasticaBundle\Manager\RepositoryManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SuperHeroController extends AbstractController
{
    /**
     * @Route("/superhero/search", name="super_hero")
     */
    public function index(RepositoryManagerInterface $manager, Request $request)
    {
        $query = $request->query->all();
        $search = isset($query['q']) && !empty($query['q']) ? $query['q'] : null;

        /** @var SuperHeroRepository $repository */
        $repository = $manager->getRepository(SuperHero::class);

        $superheroes = $repository->search($search);

        /** @var SuperHero $superhero */
        foreach ($superheroes as $superhero) {
            $data[] = [
                'name' => $superhero->getName(),
            ];
        }

        return new JsonResponse($data);
    }
}
