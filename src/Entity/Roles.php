<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
 */
class Roles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $display_name;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="RoleUser", mappedBy="role")
     */
    private $roleUser;



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
        $this->password = $display_name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDesciption($description){
        $this->descrition = $description;
    }
}
