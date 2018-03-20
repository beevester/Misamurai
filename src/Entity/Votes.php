<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VotesRepository")
 */
class Votes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    public $vote;

    /**
     * @ORM\ManyToOne(targetEntity="Nomination")
     */
    public $nomination;

    public function getNomination()
    {
      $this->nomination;
    }

    public function setNomination($nomination)
    {
      $this->nomination = $nomination;
    }

    public function getVotes()
    {
      $this->vote;
    }

    public function setVotes($vote)
    {
      $this->vote = $this->vote + $vote;
    }
}
