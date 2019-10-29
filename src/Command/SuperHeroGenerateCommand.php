<?php

namespace App\Command;

use App\Entity\SuperHero;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SuperHeroGenerateCommand extends Command
{
    protected static $defaultName = 'app:super-hero:generate';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Generates a number of Super Hero entities')
            ->addArgument('amount', InputArgument::OPTIONAL, 'Number of Super Heros', 100);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $faker = Factory::create();

        for ($i = 0; $i < $input->getArgument('amount'); $i++) {
            $hero = (new SuperHero())
                ->setName($faker->name());
            $this->entityManager->persist($hero);
            $this->entityManager->flush();
        }

        $io->success('Yasss!');

        return 0;
    }
}
