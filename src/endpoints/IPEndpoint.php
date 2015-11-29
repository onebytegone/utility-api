<?php

class IPEndpoint extends EndpointHandler {
   public function process($url, $getParams, $postParams, $user) {
      return array(
         'ip' => $user['ip']
      );
   }
}
