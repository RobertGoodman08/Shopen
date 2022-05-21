<?php


namespace app\controllers;


use app\models\Page;
use fcs\App;



/** @property Page $model */
class PageController extends AppController
{

    public function viewAction()
    {
        $lang = App::$app->getProperty('language');
        $page = $this->model->get_page($this->route['slug'], $lang);

        if (!$page) {
            $this->error_404();
            return;
        }

        $this->setMeta($page['title'], $page['description'], $page['keywords']);
        $this->set(compact('page'));
    }

}