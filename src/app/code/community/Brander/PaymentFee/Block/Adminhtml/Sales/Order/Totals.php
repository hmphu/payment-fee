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

    	$paymentFeeTitle  = Mage::getModel('payment_fee/fee')->getTotalTitle($this->getSource()->getPayment()->getMethodInstance()->getCode());
    	$paymentFeeTotal = [
    		'fee' => new Varien_Object(array(
	            'code'      => 'fee',
	            'value'     => $this->getSource()->getFeeAmount(),
	            'base_value'=> $this->getSource()->getBaseFeeAmount(),
	            'label'     => $paymentFeeTitle,
	        ))
    	];

    	$indexOfGrandTotal = array_search('grand_total', array_keys($this->_totals));
		array_splice( $this->_totals, $indexOfGrandTotal, 0, $paymentFeeTotal );

		return $this;
    }
}