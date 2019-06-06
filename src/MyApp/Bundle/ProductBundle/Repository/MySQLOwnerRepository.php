<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 10:54 AM
 */

namespace MyApp\Bundle\ProductBundle\Repository;


use Doctrine\ORM\EntityManagerInterface;
use MyApp\Domain\Repository\OwnerRepository;
use MyApp\Domain\Owner;

class MySQLOwnerRepository implements OwnerRepository
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function save(Owner $owner):void
    {
        $this->em->persist($owner);
        $this->em->flush();

    }

    public function findById(int $ownerId):Owner
    {
        $actor = $this->em
            ->getRepository('ProductBundle:Owner')
            ->findBy(['id' => $ownerId]);
        if (count($actor) === 0) {
            throw UnknownActorException::withPostId($ownerId);
        }
        return $actor[0];
    }
}