<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $avatar;

   
    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

     /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="boolean", name="is_active")
     */
    private $isActive;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $apikey;

    public function getApiKey()    {
        return $this->apikei;
    }
    
    public function setApiKey($apikey){
        $this->apikey = $apikey;
    }    

    public function __construct(){
        $this->isActive = true;
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
        return array('ROLE_USER');
    }

    public function eraseCredentials(){
        $this->plainPasswords = null;
    }

    public function serialize(){
        return serialize(array(
            $this->id,
            $this->email,
            $this->password
        ));
    }

    public function unserialize($serialized){
        list (
            $this->id,
            $this->email,
            $this->password
        ) = unserialize($serialized);
    }
}
