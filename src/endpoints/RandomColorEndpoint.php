<?php

class RandomColorEndpoint extends EndpointHandler {
   public function process($url, $getParams, $postParams, $user) {
      return array(
         'colors' => array_map(array($this, 'generateColor'), range(0, 4))
      );
   }

   private function generateColor() {
      return sprintf('#%06x', mt_rand(0, 0xFFFFFF));
   }
}
