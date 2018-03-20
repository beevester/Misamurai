<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PermissionRepository")
 */
class Permission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    public $display_name;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    public $description;


    private $permissionUser;

    /**
     * @ORM\Column(type="date")
     */
    private $created_at;

    public function __construct()
    {
      $this->created_at = new \DateTime();
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDisplay_name(){
        return $this->display_name;
    }

    public function setDisplay_name($display_name){
        $this->display_name = $display_name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

}
