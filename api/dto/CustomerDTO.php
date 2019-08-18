<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 1:30 PM
 */

class CustomerDTO
{

    private $CID;
    private $FirstName;
    Private $LastName;
    private $Email;
    private $Address;
    private $Telephone;

    /**
     * CustomerDTO constructor.
     * @param $CID
     * @param $FirstName
     * @param $LastName
     * @param $Email
     * @param $Address
     * @param $Telephone
     */
    public function __construct($CID, $FirstName, $LastName, $Email, $Address, $Telephone)
    {
        $this->CID = $CID;
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
        $this->Address = $Address;
        $this->Telephone = $Telephone;
    }

    /**
     * @return mixed
     */
    public function getCID()
    {
        return $this->CID;
    }

    /**
     * @param mixed $CID
     */
    public function setCID($CID)
    {
        $this->CID = $CID;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @param mixed $FirstName
     */
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @param mixed $LastName
     */
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }

    /**
     * @param mixed $Telephone
     */
    public function setTelephone($Telephone)
    {
        $this->Telephone = $Telephone;
    }


}