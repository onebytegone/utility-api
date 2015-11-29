<?php

class TimeEndpoint extends EndpointHandler {
   public function process($url, $getParams, $postParams, $user) {
      return array(
         'utc' => gmdate("Y-m-d\TH:i:s"),
         'timestamp' => time()
      );
   }
}
