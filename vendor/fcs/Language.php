<?php


namespace fcs;


class Language # Мультиязычность.
{

    public static array $lang_data = []; // массив со всеми переводными фразами страницы
    public static array $lang_layout = []; // массив с переводными фразами шаблона
    public static array $lang_view= []; // массив с переводными фразами вида

    public static function load($code, $view){
        $lang_layout = APP . "/languages/{$code}.php";
        $lang_view = APP . "/languages/{$code}/{$view['controller']}/{$view['action']}.php";
        if(file_exists($lang_layout)){
            self::$lang_layout = require_once $lang_layout;
        }
        if(file_exists($lang_view)){
            self::$lang_view = require_once $lang_view;
        }
        self::$lang_data = array_merge(self::$lang_layout, self::$lang_view);

    }


    public static function get($key){
        return self::$lang_data[$key] ?? $key;
    }



}