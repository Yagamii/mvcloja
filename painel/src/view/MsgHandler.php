<?php

    class MsgHandler{

      static $sucess = [];
      static $error = [];

      public static function setSucess($sucess){

        self::$sucess[] = $sucess;

      }

      public static function getSucess(){

        return self::$sucess;

      }

      public static function setError($error){

        self::$error[] = $error;

      }

      public static function getError(){

        return self::$error;

      }

    }

 ?>
