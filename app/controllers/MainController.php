<?php


namespace app\controllers;

use app\models\Main;
use fcs\App;
use fcs\Cache;
use fcs\Language;
use RedBeanPHP\R;




/** @property Main $model */
class MainController extends AppController
{

    public function indexAction()
    {

//        $test = "4";
//        $cache = Cache::getInstance();
//        $cache->set('test', $test, 30);
//        var_dump($cache->get('test'));
//        var_dump($test);


        $lang = App::$app->getProperty('language'); # Мультиязычность
        $slides = R::findAll('slider'); # Вывод слайдера


        $products = $this->model->get_hits($lang, 4); # ТОП ТОВАРЫ
        $products_new = $this->model->get_new($lang, 4); # ТОП ТОВАРЫ

        $this->set(compact('slides', 'products', 'products_new'));
        $this->setMeta(___('main_index_meta_title'), 'DDD', 'Keywords');

    }

}