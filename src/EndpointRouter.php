<?php

class EndpointRouter {
   private $handlers = array();

   public function addEndpoint($endpointHandler) {
      $this->handlers[] = $endpointHandler;
   }

   public function process($url, $getParams, $postParams, $user) {
      $handler = $this->findHandler($url);

      if ($handler) {
         $results = json_encode($handler->process($url, $getParams, $postParams, $user));

         // Use JSONP if requested
         if (isset($getParams['callback'])) {
            $results = $getParams['callback'] . "({$results})";
         }

         return $results;
      }

      // Couldn't find a handler, 404 then.
      header("HTTP/1.0 404 Not Found");
      return "";
   }

   private function findHandler($url) {
      return array_shift(array_filter($this->handlers, function($handler) use ($url) {
         return $handler->supportsURL($url);
      }));
   }
}
