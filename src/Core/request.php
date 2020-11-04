<?php

namespace App\Core;

/**
 * Class Request
 * 
 *
 * @author Christian Hernandez (@DevKhris) <devkhris@outlook.com>
 * @package namespace app\core;
 */

class Request
{
    public $req;

    public function getPath()
    {
        // get's the request uri or set's it to root
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        // gets the position of the path at mark ?
        $pos = \strpos($path, '?');
        // if position if false, return path
        if (!$pos) {
            return $path;
        }
        // substracts position mark from path
        $path = \substr($path, 0, $pos);

        // returns the path wthout params
        return $path;
    }

    public function getMethod()
    {
        // get's the method and lowercases the value
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        // returns method
        return $method;
    }
}