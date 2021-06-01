<?php
/**
 * Controller
 * PHP version 7.2
 *
 */
namespace Controllers;
require 'vendor/autoload.php';

use Amp\Delayed;
use Amp\Websocket\Client\Connection;
use Amp\Websocket\Client\Handshake;
use Amp\Websocket\Message;
use function Amp\Websocket\Client\connect;



/**
 * Class WebSocketController
 *
 * @category Controllers
 * @package  5paisa.
 * @author   5paisa. <https://www.5paisa.com/developerapi/>
 * @license  https://www.5paisa.com/developerapi/ N/A
 * @link     https://www.5paisa.com/developerapi/
 */
class WebSocketController
{
    private $commanHelper;
    private $commanCurl;
    private $aesEncryption;
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->commanHelper=new CommanHelperController();
        $this->commanCurl=new CommanCurlController();
        $this->aesEncryption=new AesEncyptionController();
    }

   
    /**
     * WebSocket API
     * @param $requestData
     * @param $headerData
     * @author 5paisa. <https://www.5paisa.com/developerapi/>
     * @return Json
     */
    public function webSocket($requestData = null, $headerData = null)
    {
        //LoginRequestMobileNewbyEmail API
        $method='POST';
        $apiUrl=BASE_URL."V4/LoginRequestMobileNewbyEmail";
        $headerType='WITHOUT_COOKIE';
        $loginData=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_WEBSOCKET_LOGIN, 'websocket_login', $headerType);
        $JwtToken=$this->commanCurl->callWebSocketLoginApi($method, $apiUrl, $loginData['reqData'], $loginData['headData'], $resHead = 1);
        
        // Starting session
        session_start();
 
        // Storing session data
        $_SESSION["JwtToken"] = $JwtToken;
        
        //LoginCheck API
        $method='POST';
        $apiUrl="https://openfeed.5paisa.com/Feeds/api/UserActivity/LoginCheck";
        $headerType='WITHOUT_COOKIE';
        $checkLoginData=$this->commanHelper->makeApi($requestData, $headerData, REQUEST_WEBSOCKET_LOGINCHECK, 'websocket_logincheck', $headerType);
       
        $ASPXAUTH=$this->commanCurl->callWebSocketLoginCheckApi($method, $apiUrl, $checkLoginData['reqData'], $checkLoginData['headData'], $resHead = 1);
        $headers = ["Cookie:".$ASPXAUTH];
        $server = 'wss://openfeed.5paisa.com/Feeds/api/chat?Value1='.$_SESSION["JwtToken"].'|56565401';
       
        $msgArry=array("Method"=>"MarketFeedV4",
        "Operation"=>"Subscribe",
        'ClientCode'=>CLIENT_CODE,
        "MarketFeedData"=>[array("Exch"=>"N",
        "ExchType"=>"C",
        "ScripCode"=>1660)]);
          
        \Amp\Loop::run(function () use($server,$ASPXAUTH,$msgArry) {
            $handshake = (new Handshake($server))
            ->withHeaders(['Cookie'=>$ASPXAUTH]);
            try 
            {
            /** @var Connection $connection */
            $connection = yield connect($handshake);
            yield $connection->send(json_encode($msgArry));
        
            $i = 0;
            echo nl2br("Connected:\n");  
            /** @var Message $message */
            while ($message = yield $connection->receive()) {
                $payload = yield $message->buffer();
        
                \printf("Received: %s\n", $payload);
        
                if (\strpos($payload, 'Goodbye!') !== false) {
                    yield $connection->close();
                    break;
                }
        
                yield new Delayed(1000);
        
                if ($i < 3) {
                    yield $connection->send('Ping: ' . ++$i);
                } else {
                    yield $connection->send('Goodbye!');
                }
            }
        }
        catch (\Amp\Websocket\ClosedException $e) 
        {
           print_r($e);
        }
        });
        print_r("Disconnected");
        
    }
}
