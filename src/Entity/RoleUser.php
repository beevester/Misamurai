<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

//Create table for associating roles to users and teams (Many to Many Polymorphic)

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoleUserRepository")
 */
class RoleUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $role_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="string")
     */
    private $user_type;

    /**
     * @ORM\ManyToOne(targetEntity="Roles", inversedBy="roleuser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    public function getRole(){
        return $this->role;
    }
    public function setRole(Role $role){
        $this->role = $role;
    }

    public function getRole_Id(){
        $this->role_id;
    }

    public function getUser_id(){
        $this->user_id;
    }

    public function getUser_type(){
        $this->getUser_type;
    }
}
