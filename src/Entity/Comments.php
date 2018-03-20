<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    public $comment;

    /**
     * @ORM\ManyToOne(targetEntity="Nomination")
     */
    public $nomination;

    /**
     * @ORM\Column(type="date")
     */
    private $created_at;

    public function __construct()
    {
      $this->created_at = new \DateTime();
    }

    public function getComment()
    {
      $this->comment;
    }

    public function setComment($comment)
    {
      $this->comment = $comment;
    }


    public function getNomination()
    {
        $this->nomination;
    }

    public function setNomination(Nomination $nomination)
    {
        $this->nomination = $nomination;
    }


}
