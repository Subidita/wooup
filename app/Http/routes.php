<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//require_once(base_path('vendor\woothemes\woocommerce-api\lib\woocommerce-api.php'));


Route::get('/', function () {
    return view('welcome');
});

Route::get('woop',function(){

    $options = array(
        'ssl_verify'      => false,
    );
    $consumer_key = "ck_0ab07384e7accf34b6237d5f3a5117b2cff2faeb" ;
    $consumer_secret = "cs_154c21b9ec0fddec292147c8cdae12ec3e36cbda" ;

    try {

        $client = new WC_API_Client( 'http://your-store-url.com', $consumer_key, $consumer_secret, $options );
        dd($client->products);

    } catch ( WC_API_Client_Exception $e ) {

        echo $e->getMessage() . PHP_EOL;
        echo $e->getCode() . PHP_EOL;

        if ( $e instanceof WC_API_Client_HTTP_Exception ) {

            print_r( $e->get_request() );
            print_r( $e->get_response() );
        }
    }

});