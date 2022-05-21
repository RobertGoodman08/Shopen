<?php


namespace app\controllers\admin;

use RedBeanPHP\R;

class MainController extends AppController
{

    public function indexAction()
    {

        $orders = R::count('orders');
        $new_orders = R::count('orders', 'status = 0');
        $users = R::count('user');
        $products = R::count('product');



        $title = 'Главная страница';
        $this->setMeta('Админка :: Главная страница');
        $this->set(compact('title', 'orders', 'new_orders', 'users', 'products'));
    }

}