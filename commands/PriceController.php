<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Coin;
use yii\httpclient\Client;
use yii\helpers\Json;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PriceController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $model = Coin::find()->All();
        foreach($model as $data) {
            
            $client = new Client(['baseUrl' => 'https://api.pancakeswap.info/api/v2/tokens/']);
            $response = $client->createRequest()
              ->setUrl($data->bsc_contract_address)
              ->addHeaders(['content-type' => 'application/json'])
              ->send();
            $price = Json::decode($response->content);
            $data->price_usd= (array_key_exists('data',$price))?$price['data']['price']:0;
            
            $data->price_bnb= (array_key_exists('data',$price))?$price['data']['price_BNB']:0;
            $data->save(false);
            

        }
        
    }
}
