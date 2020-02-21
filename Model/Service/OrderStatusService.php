<?php

namespace South\UpdateOrderStatus\Model\Service;


class OrderStatusService implements \South\UpdateOrderStatus\Api\OrderUpdateStatusInterface
{

    protected $orderRepositoryInterfce;

    protected $orderRepository;

    protected $searchCriteriaBuilder;

    public function __construct(
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepositoryInterface,
        \Magento\Sales\Model\OrderRepository $orderRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->orderRepositoryInterfce = $orderRepositoryInterface;
        $this->orderRepository = $orderRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function updateStatus(array $statusMultiple)
    {
        $result = [];

        if(!empty($statusMultiple)){
            foreach ($statusMultiple as $_statusOrder){
                $orderId = $_statusOrder->getEntityId();
                $incrementId = $_statusOrder->getIncrementId();
                $status = $_statusOrder->getStatus();
                if($orderId && $incrementId && $status){
                    if($order = $this->getOrderById($orderId)) {
                        $order = $this->orderRepository->get($orderId);
                        if ($order->getIncrementId() == $incrementId) {
                            $order->setState($status)->setStatus($status);
                            $this->orderRepository->save($order);
                            $result[] = [
                                "entity_id" => $orderId,
                                "increment_id" => $incrementId,
                                "success" => true,
                                "message" => ""
                            ];
                        }else{
                            $result[] = [
                                "entity_id" => $orderId,
                                "increment_id" => $incrementId,
                                "success" => false,
                                "message" => "The entity and increment id not match. Please try again"
                            ];
                        }
                    }else{
                        $result[] = [
                            "entity_id" => $orderId,
                            "increment_id" => $incrementId,
                            "success" => false,
                            "message" => "The entity that was requested doesn't exist. Verify the entity and try again."
                        ];
                    }
                }else{
                    $result[] = [
                        "entity_id" => $orderId,
                        "increment_id" => $incrementId,
                        "success" => false,
                        "message" => 'Missing information'
                    ];
                }
            }
        }

        return $result;
    }

    public function getOrderById($id) {
        $this->searchCriteriaBuilder->addFilter('entity_id', $id);

        $order = $this->orderRepository->getList(
            $this->searchCriteriaBuilder->create()
        )->getItems();

        return $order;
    }
}