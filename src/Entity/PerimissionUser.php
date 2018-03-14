<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

// Create table for associating permissions to users (Many To Many Polymorphic)

/**
 * @ORM\Entity(repositoryClass="App\Repository\PerimissionUserRepository")
 */
class PerimissionUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $permission_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="string")
     */
    private $user_type;

    /**
     * @ORM\ManyToOne(targetEntity="Permission", inversedBy="PermissionUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $permission;

    /**
     * @ORM\Column(type="date")
     */
    private $created_at;

    public function __construct()
    {
      $this->created_at = new \DateTime();
    }

    public function getPermission(){
        return $this->permission;
    }
    public function setPermission(Permission $permission){
        $this->permission = $permission;
    }

    public function getPermission_Id(){
        $this->permission_id;
    }

    public function getUser_id(){
        $this->user_id;
    }

    public function getUser_type(){
        $this->user_type;
    }

    public function setPermission_Id($permission_id){
        $this->permission_id = $permission_id;
    }

    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }

    public function setUser_type($user_type){
        $this->getUser_type = $user_type;
    }
}
