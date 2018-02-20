<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NominationRepository")
 */
class Nomination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $nominee;

    public function getName()
    {
        $this->id;
    }

    public function getUser()
    {
        $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getNominee()
    {
        $this->nominee;
    }

    public function setNominee(User $nominee)
    {
        $this->nominee = $nominee;
    }
}
