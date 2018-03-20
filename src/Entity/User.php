<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;



/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="app_users")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=245, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    protected $avatar;

    /**
     * @ORM\Column(type="boolean", name="is_active")
     */
    protected $isActive;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    protected $apikey;

    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

    public function __construct(){
        $this->isActive = true;
        $this->created_at = new \DateTime();
    }

    public function getDepartment()    {
        return $this->department;
    }

    public function setDepartment($department){
        $this->department = $department;
    }
    public function getId()
    {
      return $this->id;
    }
    public function getApiKey()    {
        return $this->apikei;
    }

    public function setApiKey($apikey){
        $this->apikey = $apikey;
    }

    public function getUsername()    {
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getEmail()   {
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSalt()    {
        return null;
    }

    public function getPlainPassword()    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)    {
        $this->plainPassword = $password;
        $this->password = null;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function getUpdated_at(){
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at){
        $this->updated_at = $updated_at;
    }

    public function getAvatar(){
        return $this->avatar;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

    public function getRoles(){
        return ['ROLE_USER'];
    }


    public function eraseCredentials(){
        $this->plainPasswords = null;
    }

    public function serialize(){
        return serialize(array(
            $this->id,
            $this->username,
            $this->password
        ));
    }

    public function unserialize($serialized){
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialized);
    }
}
