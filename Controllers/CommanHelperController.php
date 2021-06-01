<?php
/**
 * Controller
 * PHP version 7.2
 *
 */
namespace Controllers;

/**
 * Class CommanHelperController
 *
 * @category Controllers
 * @package  5paisa.
 * @author   5paisa. <https://www.5paisa.com/developerapi/>
 * @license  https://www.5paisa.com/developerapi/ N/A
 * @link     https://www.5paisa.com/developerapi/
 */
class CommanHelperController
{
    private $requestHelper;
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->requestHelper=new RequestHelperController();
    }
    /**
      * Get all headers of request
      * @author 5paisa. <https://www.5paisa.com/developerapi/>
      * @return Array
      */
    public function getAllHeaders()
    {
        $headerData=array();
        foreach (getallheaders() as $key => $value) {
            if ($key=='Content-Type' || $key=='Ocp-Apim-Subscription-Key') {
                $val=$key.':'.$value;
                array_push($headerData, $val);
            }
        }
        return $headerData;
    }
    /**
      * Get Json RAW request
      * @author 5paisa. <https://www.5paisa.com/developerapi/>
      * @return Json
      */
    public function getJsonRequestParams()
    {
        return $jsonRequestParams = file_get_contents('php://input');
    }
    /**
      * Default request header parameters
      * @author 5paisa. <https://www.5paisa.com/developerapi/>
      * @return array
      */
    public function defaultHeaderParam1()
    {
        $headerData = array('Content-Type: application/json');
        return $headerData;
    }
    /**
      * Default request header parameters for NetPositionNetWise API
      * @author 5paisa. <https://www.5paisa.com/developerapi/>
      * @return array
      */
    public function defaultHeaderParam2()
    {
        $headerData = array(
                            'Content-Type: application/json',
                            'Cookie: '.FIVEPAISA_COOKIE,
                            );
        return $headerData;
    }
    /**
      * API General code
      * @author 5paisa. <https://www.5paisa.com/developerapi/>
      * @return array
      */
    public function makeApi($requestData, $headerData, $requestCode, $api, $headerType)
    {
        $requestHeader=$this->getAllHeaders();
        $jsonRequestParams=$this->getJsonRequestParams();

        if ($jsonRequestParams && $requestHeader) {
            //JSON RAW Request params from postman or other api tool
            $requestData=json_decode($jsonRequestParams, true);
            $headerData=$requestHeader;
        } else {
            //Pass array of requestData & headerData in argument & overwrite this two variable.
            $requestData=!empty($requestData)?$requestData:$this->requestHelper->requestParams($api, $requestCode);
            if ($headerType=='WITHOUT_COOKIE') {
                $headerParam=$this->defaultHeaderParam1();
            } else {
                $headerParam=$this->defaultHeaderParam2();
            }
            $headerData=!empty($headerData)?$headerData:$headerParam;
        }
        return array('reqData'=>$requestData,'headData'=>$headerData);
    }
}
