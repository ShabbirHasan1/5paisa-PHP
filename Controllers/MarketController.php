<?php
/**
 * Controller
 * PHP version 7.2
 *
 */
namespace Controllers;

/**
 * Class MarketController
 *
 * @category Controllers
 * @package  5paisa.
 * @author   5paisa. <https://www.5paisa.com/developerapi/>
 * @license  https://www.5paisa.com/developerapi/ N/A
 * @link     https://www.5paisa.com/developerapi/
 */
class MarketController
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
     * MarketFeed API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function marketFeed($requestData = null, $headerData = null)
    {
        $method='POST';
        $apiUrl=BASE_URL."MarketFeed";
        $headerType='WITHOUT_COOKIE';
        $data=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_CODE_MARKETFEED, 'marketFeed', $headerType);
        return $this->commanCurl->callApi($method, $apiUrl, $data['reqData'], $data['headData']);
    }

}
