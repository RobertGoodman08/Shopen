<?php


function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    if ($die) {
        die;
    }
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


function redirect($http = false){
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}


function base_url(){

    return PATH . '/' . (\fcs\App::$app->getProperty('lang') ? \fcs\App::$app->getProperty('lang') . '/' : '');
}




/**
 * @param string $key Key of GET array
 * @param string $type Values 'i', 'f', 's'
 * @return float|int|string
 */

function get($key, $type = 'i')
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif ($type == 'f'){
        return (float)$$param;
    } else{
        return trim($$param);
    }
}

/**
 * @param string $key Key of POST array
 * @param string $type Values 'i', 'f', 's'
 * @return float|int|string
 */

function post($key, $type = 's')
{
    $param = $key;
    $$param = $_POST[$param] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif ($type == 'f'){
        return (float)$$param;
    } else{
        return trim($$param);
    }
}


function __($key){
    echo \fcs\Language::get($key);
}

function ___($key){
    return \fcs\Language::get($key);
}

function get_cart_inco($id){
    if(!empty($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart'])){
        $icon = '<i class="fa-luggage-cart"> </i>';
    } else {
        $icon = '<i class="fa-luggage-cart"> </i>';
    }
    return $icon;
}

function get_field_value($name){
    return isset($_SESSION['form_data'][$name]) ? h($_SESSION['form_data'][$name]) : '';
}


function get_field_array_value($name, $key, $index){
    return isset($_SESSION['form_data'][$name][$key][$index]) ?
                    h($_SESSION['form_data'][$name][$key][$index]) : '';
}