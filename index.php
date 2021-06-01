<?php

//Error Reporting functions
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "router.php";
require_once "Configuration/config.php";

//Included all controller files
foreach (glob("Controllers/*.php") as $classFileDirectory) {
    include $classFileDirectory;
}

// Routing & calling controller & its respective method
route('/LoginRequestMobileNewbyEmail', function () {
    $obj=new \Controllers\AuthController();
    $obj->loginRequestMobileNewbyEmail();
});

/*Market API*/
route('/MarketFeed', function () {
    $obj=new \Controllers\MarketController();
    $obj->marketFeed();
});

/*Order API*/
route('/OrderRequest', function () {
    $obj=new \Controllers\OrderController();
    $obj->orderRequest();
});

route('/OrderStatus', function () {
    $obj=new \Controllers\OrderController();
    $obj->orderStatus();
});

route('/TradeInformation', function () {
    $obj=new \Controllers\OrderController();
    $obj->tradeInformation();
});

route('/TradeBook', function () {
    $obj=new \Controllers\OrderController();
    $obj->tradeBook();
});

route('/SMOOrderRequest', function () {
    $obj=new \Controllers\OrderController();
    $obj->smoOrderRequest();
});

route('/ModifySMOOrder', function () {
    $obj=new \Controllers\OrderController();
    $obj->modifySMOOrder();
});


/*Report API*/
route('/Margin', function () {
    $obj=new \Controllers\ReportController();
    $obj->margin();
});

route('/OrderBook', function () {
    $obj=new \Controllers\ReportController();
    $obj->orderBook();
});

route('/Holding', function () {
    $obj=new \Controllers\ReportController();
    $obj->holding();
});

route('/NetPositionNetWise', function () {
    $obj=new \Controllers\ReportController();
    $obj->netPositionNetWise();
});

route('/websocket', function () {
    $obj=new \Controllers\WebSocketController();
    $obj->webSocket();
});
$action = $_SERVER['REQUEST_URI'];
dispatch($action);
