<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/18/2019
 * Time: 11:27 AM
 */

class OrderDTO
{
    private $OrderID;
    private $Date;
    private $CID;

    /**
     * OrderDTO constructor.
     * @param $OrderID
     * @param $Date
     * @param $CID
     */
    public function __construct($OrderID, $Date, $CID)
    {
        $this->OrderID = $OrderID;
        $this->Date = $Date;
        $this->CID = $CID;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->OrderID;
    }

    /**
     * @param mixed $OrderID
     */
    public function setOrderID($OrderID)
    {
        $this->OrderID = $OrderID;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
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
}