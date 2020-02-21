<?php

namespace South\UpdateOrderStatus\Api;


interface OrderUpdateStatusInterface
{

    /**
     * Update status for multiple order
     *
     * @param \South\UpdateOrderStatus\Api\Data\OrderStatusMultipleInterface[] $statusMultiple
     * @return string
     */
    public function updateStatus(array $statusMultiple);
}