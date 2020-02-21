<?php

namespace South\UpdateOrderStatus\Api\Data;


interface OrderStatusMultipleInterface extends \Magento\Framework\Api\CustomAttributesDataInterface
{
    const ENTITY_ID = 'entity_id';
    const INCREMENT_ID = 'increment_id';
    const STATUS = 'status';

    /**
     * @return int|null
     */
    public function getEntityId();

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * @return string|null Increment ID.
     */
    public function getIncrementId();

    /**
     *
     * @param string $id
     * @return $this
     */
    public function setIncrementId($id);

    /**
     * @return string|null Status
     */
    public function getStatus();

    /**
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status);



}