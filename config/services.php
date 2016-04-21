<?php


use ObjectivePHP\ServicesFactory\Config\Service;
use ObjectivePHP\ServicesFactory\ServiceReference;
use Project\Controller\OrderController;
use Project\Gateway\AccountingGateway;
use Project\Service\AccountingService;
use Zend\ServiceManager\ServiceManager;

return [
    'factories' => [
        'controller.order' => function(ServiceManager $sm) {
            $controller = new OrderController();
            $controller->setAccountingService($sm->get('service.accounting'));
            return $controller;
        },
        'service.accounting' => function(ServiceManager $sm) {
            $service = new AccountingService();
            $service->setAccountingGateway($sm->get('gateway.accounting'));
            return $service;
        },
        'gateway.accounting' => function(ServiceManager $sm) {
            $gateway = new AccountingGateway();
            return $gateway;
        }
    ]
];