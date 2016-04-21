<?php


use ObjectivePHP\Config\Loader\DirectoryLoader;
use ObjectivePHP\ServicesFactory\Config\Service;
use ObjectivePHP\ServicesFactory\ServicesFactory;
use Project\Controller\OrderController;
use Project\Entity\Invoice;
use Project\Service\AccountingService;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

require 'vendor/autoload.php';

// ServicesFactory initialization
$serviceManager = new ServiceManager();
$servicesConfig = new Config(require __DIR__ . '/config/services.php');
$servicesConfig->configureServiceManager($serviceManager);

// Controller initialization
$controller = $serviceManager->get('controller.order');
// $controller = new OrderController();
// $controller->setAccountingService(new AccountingService());

class MockAccountingService extends AccountingService
{
    public function save(Invoice $invoice)
    {
        echo __METHOD__;
    }
}

// $controller->setAccountingService(new MockAccountingService());

var_dump($controller);

$controller->checkoutAction();
