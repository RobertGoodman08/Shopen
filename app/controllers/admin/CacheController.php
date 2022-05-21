<?php


namespace app\controllers\admin;


use fcs\App;
use fcs\Cache;
use RedBeanPHP\R;

class CacheController extends AppController
{

    public function indexAction(){



        $title = 'Управление кэшем';
        $this->setMeta("Админка :: {$title}");
        $this->set(compact('title', ));
    }


    public function deleteAction(){

        $langs = App::$app->get('languages');
        $cache_key = get('cache', 's');
        $cache = Cache::getInstance();
        if($cache_key == 'category'){
            foreach ($langs as $lang => $item){
                $cache->delete("ishop_menu_{$lang}");
            }
        }

        if($cache_key == 'page'){
            foreach ($langs as $lang => $item){
                $cache->delete("ishop_page_menu_{$lang}");
            }
        }
        $_SESSION['success'] = 'Выбранный кэш удален';
        redirect();
    }

}