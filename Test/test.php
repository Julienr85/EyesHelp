<?php
// Use https://github.com/wonderpush/wonderpush-php-lib

// Our library has an easy API for each endpoint!
// Take a look at POST /deliveries.

// For completeness, here is how you would place an arbitrary call
$Accesstoken = "YTUyODk0NjEwOGEwNzJiNThhN2E1NzA5ZGY0MDgyMDQ1ZDY1NmRjOTM2YTU1MTQ4NjM2NTIxZTBkZWFmNjEzZA";
$Applicationid = "01bv4oph9glup7b2";

$wonderpush = new \WonderPush\WonderPush($Accesstoken, $Applicationid);
$response = $wonderpush->rest()->post('/deliveries',
                                       [{
                                        "targetSegmentIds": "@all",
                                        "notification": {
                                          "alert": {
                                            "text": "hello"
                                          }
                                        }
                                      };],
                                    );

if ($response->getStatusCode() === 0) {
  echo 'Error ' . $response->getHeaders()[self::HEADER_CURL_ERROR];
} else if ($response->parsedBody() instanceof \Exception) {
  echo 'Parsing error ' . $response->parseErrorMsg() . ' with body ' . $response->getRawBody();
} else if ($response->getStatusCode() < 200 || $response->getStatusCode() > 299) {
  echo 'Error ' . $response->getStatusCode() . ': ' . json_encode($response->parsedBody());
} else {

  echo 'Success: ' . json_encode($response->parsedBody());

}
?>
