<?php

namespace South\UpdateOrderStatus\Model;


class OrderStatusMultiple extends \Magento\Framework\Api\AbstractExtensibleObject implements \South\UpdateOrderStatus\Api\Data\OrderStatusMultipleInterface
{

    protected $_entityId;

    protected $_incrementId;

    protected $_status;

    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    public function getIncrementId()
    {
        return $this->_get(self::INCREMENT_ID);
    }

    public function setIncrementId($id)
    {
        return $this->setData(self::INCREMENT_ID, $id);
    }

    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }


}