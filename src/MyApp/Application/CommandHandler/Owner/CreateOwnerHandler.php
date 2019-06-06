<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 10:36 AM
 */

namespace MyApp\Application\CommandHandler\Owner;


use MyApp\Application\Command\Owner\CreateOwnerCommand;

use MyApp\Domain\Owner;
use MyApp\Domain\Repository\OwnerRepository;

class CreateOwnerHandler
{
    private $ownerRepository;

    public function  __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function  handle (CreateOwnerCommand $command):Owner{
        $owner = Owner::create($command->getName());
        $this->ownerRepository->save($owner);
        return $owner;
    }
}