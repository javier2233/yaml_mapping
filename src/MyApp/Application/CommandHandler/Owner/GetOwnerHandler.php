<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 10:47 PM
 */

namespace MyApp\Application\CommandHandler\Owner;


use MyApp\Domain\Owner;
use MyApp\Domain\Repository\OwnerRepository;

class GetOwnerHandler
{
    private $ownerRepository;

    public function  __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function  handle (int $ownerId):Owner{
        $actor = $this->ownerRepository->findById($ownerId);
        return $actor;
    }
}