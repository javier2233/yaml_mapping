<?php

namespace MyApp\Domain\Repository;


use MyApp\Domain\Owner;

interface OwnerRepository
{

    public function save(Owner $owner);
    public function findById(int $ownerId):Owner;

}