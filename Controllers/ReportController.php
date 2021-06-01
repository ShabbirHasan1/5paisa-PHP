<?php
/**
 * Controller
 * PHP version 7.2
 *
 */
namespace Controllers;

/**
 * Class ReportController
 *
 * @category Controllers
 * @package  5paisa.
 * @author   5paisa. <https://www.5paisa.com/developerapi/>
 * @license  https://www.5paisa.com/developerapi/ N/A
 * @link     https://www.5paisa.com/developerapi/
 */
class ReportController
{
    private $commanCurl;
    private $commanHelper;
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->commanHelper=new CommanHelperController();
        $this->commanCurl=new CommanCurlController();
    }

    /**
     * (Report) Holding API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function holding($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."V2/Holding";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_HOLDING, 'report', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }

    /**
     * (Report) Margin API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function margin($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."V3/Margin";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_MARGIN, 'report', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
    /**
     * (Report) OrderBook API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function orderBook($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."V2/OrderBook";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_ORDER_BOOK, 'report', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }

    /**
    * (Report) NetPositionNetWise API
    * @param $requestData
    * @param $headerData
    * @author 5paisa. <https://www.5paisa.com/developerapi/>
    * @return Json
    */
    public function netPositionNetWise($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."V1/NetPositionNetWise";
        $headerType='WITH_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_POSITION, 'report', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }
}
