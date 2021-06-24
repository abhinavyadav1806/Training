<?php
if(isset($_POST['submit']))
{
    $apiKey = "d888081f4c46bba94e223dcff46c45ea";
    $cityname = $_POST['address'];
    $googleApiUrl = "api.openweathermap.org/data/2.5/forecast?q=" . $cityname . "&cnt=5&appid=" . $apiKey . "";
    // $googleApiUrl = "api.openweathermap.org/data/2.5/weather?q={$cityname}&appid={$apiKey}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    $response = curl_exec($ch);

    curl_close($ch);
    // print_r($response);

    $data = json_decode($response);
    echo '<pre>';
        print_r($data);
    echo '</pre>';
    
    $currentTime = time();
}
?>

<!doctype html>
<head>
    <title>Forecast Weather using OpenWeatherMap with PHP</title>
</head>

<body>
 
</body>

</html>