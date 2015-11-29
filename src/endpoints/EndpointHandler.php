<?php

class EndpointHandler {
   public $urlFormat = "";

   function __construct($urlFormat) {
      $this->urlFormat = $urlFormat;
   }

   public function supportsURL($url) {
      return $url == $this->urlFormat;
   }

   public function process($url, $getParams, $postParams, $user) {
      return array();
   }
}
