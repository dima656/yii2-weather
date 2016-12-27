<?php
//namespace app\views;
//use Yii;
?>
<pre>
<?php

/*
 * show all available parameters
 * */
print_r($yahoo);

$icon=$res['weather']['0']['icon'].".png";
$icon1=$yahoo['current']['condition']['icon'];


?></pre>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>City</th>
            <th>Temperature</th>
            <th>Weather type</th>
            <th>Icon</th>
            <th>Pressure</th>
            <th>Humidity</th>
            <th>Wind Speed</th>
            <th>Clouds %</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>openweather</td>
            <td><?=  $res['name']?></td>
            <td><?=  $res['main']['temp']?></td>
            <td><?=  $res['weather']['0']['description']?></td>
            <td><?=  \yii\helpers\Html::img("http://openweathermap.org/img/w/{$icon} ")?></td>
            <td><?=  $res['main']['pressure']?></td>
            <td><?=  $res['main']['humidity']?></td>
            <td><?=  $res['wind']['speed']?></td>
            <td><?=  $res['clouds']['all']?></td>
        </tr>
        <tr>
            <td>yahoo</td>
            <td><?php  echo $yahoo ['location']['name']?></td>
            <td><?=  $yahoo ['current']['temp_c']?></td>
            <td><?=  $yahoo['current']['condition']['text']?></td>
            <td><?php echo  \yii\helpers\Html::img($icon1)?></td>
            <td><?=  $yahoo['current']['pressure_mb']?></td>
            <td><?php echo  $yahoo ['current'] ['humidity']?></td>
            <td><?php echo $yahoo['current']['wind_kph']?></td>
            <td><?=  $yahoo['current']['cloud']?></td>
        </tr>


        </tbody>
    </table>
</div>


