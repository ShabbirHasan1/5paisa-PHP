# 5paisa Open APIs: PHP
PHP OOPs based structure library for trading Apis.

## Documentation

Read the docs hosted [here](https://5paisa.github.io/)

## Features

-   Order placement, modification and cancellation
-   Fetching user info including holdings, positions, margin and order book.
-   Fetching live market streaming.
-   Placing, modifying and deleting Bracket Order.
-   Fetching order status and trade information.
-   Getting live data streaming using websockets.


## Requirement
 ```php
 - PHP Version >= 7.2
 - CURL extension should be installed & Enable
 - Composer required
 ```

## Installation
```php
- Download PHP library & put on your localhost
```
## Structure
```php
-Configuration
 |-Config.php
-Controllers
 |-AesEncryptionController.php
 |-AuthController.php
 |-MarketController.php
 |-OrderController.php
 |-ReportController.php
-vendor
-index.php
-route.php
-requirement.txt
-README.MD
-composer.json
-composer.lock
Description
------------

AesEncryptionController : Contain AES-256-CBC Encryption
AuthController: Contain API end point LoginRequestMobileNewbyEmail
MarketController: Contain API end point MarketFeed
OrderController: Contain API end point OrderRequest,OrderStatus,TradeInformation,TradeBook
ReportController: Contain API end point Holding,Margin,NetPositionNetWise,OrderBook



```
## Usage

```php
Step-1: Put Application credentials in Configuration/Config.php file
Step-2: Open Command-line interface & go to project directory & write below two commands
        composer update
        php -S localhost:8000
Step-3: Open browser & run the Url: http://localhost:8000/LoginRequestMobileNewbyEmail

Alternative Way of use
------------------
You can include the controller from directory "Controllers/"
& call its method by passing request params array & headers params array as two arguments.

Example:

 include Controller/AuthController;

 $obj=new \Controllers\AuthController();
 $obj->loginRequestMobileNewbyEmail($requestData, $headerData);

```

## Configuring API keys
Get your API keys from https://www.5paisa.com/developerapi/apikeys

Configure keys in a file named `Configration/config.php`.
Configure Request parameters in a file name "Controllers/RequestHelperController.php" 


## Running Application Note:
Encryption : AES-256-CBC Encryption used

Cookie: Get Cookie in 'LoginRequestMobileNewbyEmail' Apis's response header & save in cookie or session for other API calling & passed in header like this.
'5paisacookie=nzqxurlfotqhywnklfb0x3pk'



## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.



## License
[MIT](https://choosealicense.com/licenses/mit/)