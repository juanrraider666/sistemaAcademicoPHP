<?php


namespace App\Entity;


use App\Service\QueryService;

class User extends QueryService
{

    public $id;

    var $table = 'user';

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_BLOCKED = 3;

    const PROFILE_USER = 1;
    const PROFILE_CLIENT = 2;


    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $mobile;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $gender;
    /**
     * @var string
     */
    private $password;


    public function __construct()
    {
        parent::__construct($this->table);
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }


    public function getFirstNameLastName()
    {
       return printf(
            '%s  %s',
            $this->getName(),
            $this->getLastName()
        );
    }



//    public  function saveUser()
//    {
//        $query = "INSERT INTO user "
//        $this->_SQL_tool('INSERT',__METHOD__, $query);
//
//    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


}