<?php

require __DIR__ . '/vendor/autoload.php';



// Change the following with your app details:

// Create your own pusher account @ https://app.pusher.com
// $app_id = "1055614";
// $key = "25e0cc929c639cd3a5f6";
// $secret = "a14285331a6b3247716e";
// $cluster = "mt1";


$options = array(

   'cluster' => 'mt1',

   'encrypted' => true

 );

 $pusher = new Pusher\Pusher(

   '25e0cc929c639cd3a5f6',

   'a14285331a6b3247716e',

   '1055614',

   $options

 );



// Check the receive message

if(isset($_POST['message']) && !empty($_POST['message'])) {

  $data = $_POST['message'];

// Return the received message

if($pusher->trigger('test_channel', 'my_event', $data)) {

echo 'success';

} else {

echo 'error';

}

}