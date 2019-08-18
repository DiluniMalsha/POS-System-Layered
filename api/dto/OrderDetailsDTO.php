<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/18/2019
 * Time: 11:29 AM
 */

class OrderDetailsDTO
{
    private $OrderID;
    private $Code;
    private $Qty;
    private $Total;

    /**
     * OrderDetailsDTO constructor.
     * @param $OrderID
     * @param $Code
     * @param $Qty
     * @param $Total
     */
    public function __construct($OrderID, $Code, $Qty, $Total)
    {
        $this->OrderID = $OrderID;
        $this->Code = $Code;
        $this->Qty = $Qty;
        $this->Total = $Total;
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
    public function getQty()
    {
        return $this->Qty;
    }

    /**
     * @param mixed $Qty
     */
    public function setQty($Qty)
    {
        $this->Qty = $Qty;
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

}