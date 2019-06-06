<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 5/06/2019
 * Time: 10:35 AM
 */

namespace MyApp\Application\Command\Owner;


class CreateOwnerCommand
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}