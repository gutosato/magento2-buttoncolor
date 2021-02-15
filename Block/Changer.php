<?php


namespace Hibrido\Buttoncolor\Block;

class Changer extends \Magento\Framework\View\Element\Template
{

    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getButtonColorConfig()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        return $this->_scopeConfig->getValue('hibrido_buttoncolor/general_config/color_hex', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }
}
