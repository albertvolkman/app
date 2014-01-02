<?php
/**
 * @file AddMaintainerCommand.php
 * The mirror command simply
 */


namespace HubDrop\Bundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddMaintainerCommand extends ContainerAwareCommand
{
  protected function configure()
  {
    $this
      ->setName('hubdrop:maintainers')
      ->setDescription('Looks up maintainers.')
      ->addArgument(
        'name',
        InputArgument::REQUIRED,
        'Which drupal project are we talkin, here?'
      )
//      ->addArgument(
//        'username',
//        InputArgument::REQUIRED,
//        'What is your drupal username?'
//      )
//      ->addOption(
//        'github_username',
//        null,
//        InputOption::VALUE_OPTIONAL,
//        'What is your github username, if different than your drupal username?'
//      )
//      ->addOption(
//         'password',
//         null,
//         InputOption::VALUE_OPTIONAL,
//         'What is Your drupal.org password?'
//      )
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // Get hubdrop service & project.
    $hubdrop = $this->getContainer()->get('hubdrop');
    $project = $hubdrop->getProject($input->getArgument('name'));

    $data = $project->getMaintainers();
    print_r($data);

  }
}