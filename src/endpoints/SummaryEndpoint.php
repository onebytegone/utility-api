<?php

class SummaryEndpoint extends EndpointHandler {
   private $handlers = array();

   public function process($url, $getParams, $postParams, $user) {
      return array_reduce($this->handlers, function($memo, $handler) use ($getParams, $postParams, $user) {
         $memo[$handler->urlFormat] = $handler->process($handler->urlFormat, $getParams, $postParams, $user);
         return $memo;
      }, array());
   }

   public function addHandlers($handlers) {
      $this->handlers = array_merge($this->handlers, $handlers);
   }
}
