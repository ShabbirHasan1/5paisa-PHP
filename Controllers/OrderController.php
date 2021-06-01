<?php
/**
 * Controller
 * PHP version 7.2
 *
 */
namespace Controllers;

/**
 * Class OrderController
 *
 * @category Controllers
 * @package  5paisa.
 * @author   5paisa. <https://www.5paisa.com/developerapi/>
 * @license  https://www.5paisa.com/developerapi/ N/A
 * @link     https://www.5paisa.com/developerapi/
 */
class OrderController
{
    private $commanCurl;
    private $commanHelper;
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->commanCurl=new CommanCurlController();
        $this->commanHelper=new CommanHelperController();
    }

    /**
     * OrderRequest API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function orderRequest($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."V1/OrderRequest";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_OREDER_REQUEST, 'orderRequest', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
    /**
     * OrderStatus API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function orderStatus($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."OrderStatus";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_OREDER_STATUS, 'orderStatus', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
    /**
     * TradeInformation API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function tradeInformation($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."TradeInformation";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_TRADE_INFO, 'tradeInfo', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
    /**
     * TradeBook API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function tradeBook($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."V1/TradeBook";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_TRADE_BOOK, 'tradeInfo', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
    /**
     * SMOOrderRequest API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function smoOrderRequest($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."SMOOrderRequest";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_SMO_ORDER_REQUEST, 'smoorderrequest', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
    /**
     * ModifyOrderRequest API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function modifySMOOrder($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."ModifySMOOrder";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_MODIFY_SMO_ORDER, 'modifysmoorder', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
}
