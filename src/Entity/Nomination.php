<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NominationRepository")
 */
class Nomination implements \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    public $user;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    public $nominee;

    /**
     * @ORM\Column(name="Nominated_on", type="date")
     */
    public $nominateDate;

    public function __construct()
    {
      $this->nominateDate = new \DateTime();
    }

    public function getId()
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

    public function serialize(){
        return serialize(array(
            $this->id,
            $this->user,
            $this->nomination
        ));
    }

    public function unserialize($serialized){
        list (
            $this->id,
            $this->user,
            $this->nomination
        ) = unserialize($serialized);
    }
}
