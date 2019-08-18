<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 4:06 PM
 */

class ItemDTO
{
    private $Code;
    private $Name;
    Private $Price;
    private $AddedDate;
    private $Total;
    private $Sold;
    private $Returned;

    /**
     * ItemDTO constructor.
     * @param $Code
     * @param $Name
     * @param $Price
     * @param $AddedDate
     * @param $Total
     * @param $Sold
     * @param $Returned
     */
    public function __construct($Code, $Name, $Price, $AddedDate, $Total, $Sold, $Returned)
    {
        $this->Code = $Code;
        $this->Name = $Name;
        $this->Price = $Price;
        $this->AddedDate = $AddedDate;
        $this->Total = $Total;
        $this->Sold = $Sold;
        $this->Returned = $Returned;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * @param mixed $Code
     */
    public function setCode($Code)
    {
        $this->Code = $Code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * @param mixed $Price
     */
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    /**
     * @return mixed
     */
    public function getAddedDate()
    {
        return $this->AddedDate;
    }

    /**
     * @param mixed $AddedDate
     */
    public function setAddedDate($AddedDate)
    {
        $this->AddedDate = $AddedDate;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * @param mixed $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
    }

    /**
     * @return mixed
     */
    public function getSold()
    {
        return $this->Sold;
    }

    /**
     * @param mixed $Sold
     */
    public function setSold($Sold)
    {
        $this->Sold = $Sold;
    }

    /**
     * @return mixed
     */
    public function getReturned()
    {
        return $this->Returned;
    }

    /**
     * @param mixed $Returned
     */
    public function setReturned($Returned)
    {
        $this->Returned = $Returned;
    }


}