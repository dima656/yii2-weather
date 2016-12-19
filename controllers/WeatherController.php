<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use GuzzleHttp\Client;
//use yii\httpclient\Client;

class WeatherController extends Controller
{


 public function actionIndex() {

     $city=Yii::$app->request->get('city');
     if(empty($city)) $city='kiev';

     $client1 = new Client();
     $res=$client1->request(
         'GET',
         "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid=cabe697ce60261ce46d0a02871a872e0&units=metric&lang=ua"
     );


     $res=$res->getBody()->getContents();
     $res  = json_decode($res, true);





     return $this->render('weather',['res'=>$res]);
 }


}