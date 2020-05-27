<?php

class Brander_PaymentFee_Block_Adminhtml_Sales_Order_Totals extends Mage_Adminhtml_Block_Sales_Order_Totals
{
	/**
     * Initialize order totals array
     *
     * @return Mage_Sales_Block_Order_Totals
     */
    protected function _initTotals()
    {
    	parent::_initTotals();
        $this->_totals = Mage::helper('payment_fee')->addFeeToOrderTotals($this);
		return $this;
    }
}