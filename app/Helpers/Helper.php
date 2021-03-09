<?php

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        # code...
        foreach ($uri as $url) {
            # code...
            if (Route::is($url)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}


// function set_active($route)
// {
//     if (is_array($route)) {
//         return in_array(Request::path(), $route) ? 'active' : '';
//     }
//     return Request::path() == $route ? 'active' : '';
// }
