<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NominateRepository")
 */
class Nominate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM/Column(type="integer")
     */
    private $voterId;

    /**
     * @ORM/Column(type="integer")
     */
    private $nomineeId;

    /**
     * @ORM/Column(type="date")
     */
    private $create_on;
}

