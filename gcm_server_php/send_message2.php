<?php


    $regId = $_GET["regId"];
    $message = $_GET["message"];
    
    include_once './GCM2.php';
    
    $gcm = new GCM();

    $registatoin_ids = array("APA91bG8nhMCT3_0lCn9suQThfD6vd6gQpsC-kjzYkCTz9D-7MSehIC6KUBjqMfn71afDZUpG0jhEbJHTQa0Lhf5UpS89t0-v5fLmeA-vOFzNWxChLchkVo0ksTW14aaTfeoLorxAnlFIdkxsu6gnfn_FJQi_2PzPw");
    $message = array("price" => "hello");

    $result = $gcm->send_notification($registatoin_ids, $message);

    echo $result;

?>
