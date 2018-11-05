<?php namespace Core;

/**
 * Class Confessor
 * @author Marlon v/d Linde <marlonv@protonmail.com>
 *
 * Manager for environment variables and custom configuration handling.
 */
class Confessor
{
    private $environment = [];

    public function __construct()
    {
        $this->cacheEnv();
    }

    public function get(string $key) : string {
        if (array_key_exists($key, $this->environment)) {
            return $this->environment[$key];
        }
        return '';
    }

    private function cacheEnv() {
        if (empty($this->environment)) {
            $this->environment = getenv();
        }
    }
}