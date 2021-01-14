<?php


namespace App\Core;


class Session
{

    const FLASH = 'FLASH_MESSAGES';
    const NORMAL='NORMAL_MESSAGES';
    private array $flashMessages;
    private array $data;

    public function __construct(){
        #Session timeout, 2628000 sec = 1 month, 604800 = 1 week, 57600 = 16 hours, 86400 = 1 day
        ini_set('session.save_path', STORAGE_PATH.DS.'sessions');
        ini_set('session.gc_maxlifetime', 57600);
        ini_set('session.cookie_lifetime', 57600);
        ini_set('session.cache_expire', 57600);
        ini_set('session.name', APP_NAME);
        session_start();

    }

    public function set($key,$value){
        $_SESSION[self::NORMAL][$key] = $value;
    }
    public function get($key){
        return $_SESSION[self::NORMAL][$key] ?? null;
    }
    public function setFlash($key,$value){
        $_SESSION[self::FLASH][$key] = $value;
    }
    public function getFlash($key){
        $message = $_SESSION[self::FLASH][$key] ?? null;
        unset($_SESSION[self::FLASH][$key]);
        return $message;

    }
    public function hasFlash($key){
        return isset($_SESSION[self::FLASH][$key]);
    }

    public function has($key){
        return ($this->get($key) && !empty($this->get($key)) && $this->get($key) != null);
    }
}