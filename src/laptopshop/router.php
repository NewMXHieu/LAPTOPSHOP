<?php

class Route{
    private static $uriList = array();
    private static $uriCallback = array();

    static public function add($uri, $function)
    {
        self::$uriList[] = $uri;
        self::$uriCallback[$uri] = $function;
    }

    static public function submit()
    {
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        $doesUriMatch = false;

        // var_dump($uri);
        // var_dump(self::$uriList);
        // return;

        foreach(self::$uriList as $u)
        {
            if($u == $uri) {
                $doesUriMatch = true;
                break;
            }
        }

        if($doesUriMatch) {
            call_user_func(self::$uriCallback[$uri]);
        } else {
            http_response_code(404);
            require __DIR__ . '/404.php';
        }
    }
}
?>