<?php

class Session {
  public static function exists() {
    return (isset($_SESSION[$name])) ? TRUE : FALSE;
  }

  public static function put($name, $value) {
    return $_SESSION[$name] = $value;
  }

  public static function get($name) {
    return $_SESSION[$name];
  }

  public static function delete($name) {
    if (self::exists($name)) {
      unset($_SESSION[$name]);
    }
  }
}
