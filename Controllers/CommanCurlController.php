<?php
/**
 * Controller
 * PHP version 7.2
 *
 */
namespace Controllers;

/**
 * Class CommanCurlController
 *
 * @category Controllers
 * @package  5paisa.
 * @author   5paisa. <https://www.5paisa.com/developerapi/>
 * @license  https://www.5paisa.com/developerapi/ N/A
 * @link     https://www.5paisa.com/developerapi/
 */
class CommanCurlController
{

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }
    /**
      * Call API by curl
      * @param Request $request
      * @author 5paisa. <https://www.5paisa.com/developerapi>
      * @return string
      */
    public function callApi($apiMethod, $apiUrl, $requestData, $headerData = array(), $resHead = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);

        switch ($apiMethod) {
            case "GET":
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case "POST":
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                break;
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerData);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        if ($resHead) {
            curl_setopt($curl, CURLOPT_HEADER, 1);
        }

        $result = curl_exec($curl);
        echo $result . "\n";
    }

    /**
      * Call WEBSOCKETAPI by curl
      * @param Request $request
      * @author 5paisa. <https://www.5paisa.com/developerapi>
      * @return string
      */
      public function callWebSocketLoginApi($apiMethod, $apiUrl, $requestData, $headerData = array(), $resHead = null)
      {
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $apiUrl);
  
          switch ($apiMethod) {
              case "GET":
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                  break;
              case "POST":
                  curl_setopt($curl, CURLOPT_POST, true);
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  break;
              case "PUT":
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                  break;
              case "DELETE":
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  break;
          }
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headerData);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          if ($resHead) {
              curl_setopt($curl, CURLOPT_HEADER, 1);
          }
  
          $result = curl_exec($curl);
          preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);        // get cookie

          $cookies = array();
          foreach($matches[1] as $item) {
              parse_str($item, $cookie);
              $cookies = array_merge($cookies, $cookie);
          }
          return $cookies['JwtToken'];
      }

        /**
      * Call WEBSOCKETAPI by curl
      * @param Request $request
      * @author 5paisa. <https://www.5paisa.com/developerapi>
      * @return string
      */
      public function callWebSocketLoginCheckApi($apiMethod, $apiUrl, $requestData, $headerData = array(), $resHead = null)
      {
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $apiUrl);
  
          switch ($apiMethod) {
              case "GET":
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                  break;
              case "POST":
                  curl_setopt($curl, CURLOPT_POST, true);
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  break;
              case "PUT":
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                  break;
              case "DELETE":
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestData));
                  break;
          }
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headerData);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          if ($resHead) {
              curl_setopt($curl, CURLOPT_HEADER, 1);
          }
  
          $result = curl_exec($curl);
        
          preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);        // get cookie
       
          $ASPXAuth = str_replace( array( 'Set-Cookie:'), ' ', $matches[0][0]);
          return $ASPXAuth;
        
      }
}
