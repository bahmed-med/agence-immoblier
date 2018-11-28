<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraint as Assert;


class Contact {
    
    /**
     * @var string 
     * @Assert\NotBlanck()
     * @Assertt\Length(min=2, max=20)
     */
    private $firstname;
    
    /**
     * @var string 
     * @Assert\NotBlanck()
     * @Assert\Length(min=2, max=20)
     */
    private $lastname;
    
    /**
     * @var string 
     * @Assert\NotBlanck()
     * @Assert\Regex(pattern="/[0-9]{10}/")
     */
    private $phone;
    
    /**
     * @var string 
     * @Assert\NotBlanck()
     * @Assert\Email()
     */
    private $email;
    
    /**
     * @var string 
     * @Assert\NotBlanck()
     * @Assert\Length(min=20)
     */
    private $message;
    
    /**
     *
     * @var Property 
     */
    private $property;
    
    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getMessage() {
        return $this->message;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMessage($message) {
        $this->message = $message;
    }
    
    function getProperty(): Property {
        return $this->property;
    }

    function setProperty(Property $property) {
        $this->property = $property;
    }




}
