<?php


namespace app\controllers;


use app\models\Cart;
use fcs\App;
use app\models\User;
use app\models\Order;


/** @property Cart $model */

class CartController extends AppController
{


    public function addAction(): bool
    {
        $lang = App::$app->getProperty('language');
        $id = get('id');
        $qty = get('qty');

        if (!$id) {
            return false;
        }

        $product = $this->model->get_product($id, $lang);

        if (!$product) {
            return false;
        }


        $this->model->add_to_cart($product, $qty);
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
        return true;
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }


    public function deleteAction()
    {
        $id = get('id');
        if (isset($_SESSION['cart'][$id])) {
            $this->model->delete_item($id);
        }
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction()
    {
        if(empty($_SESSION['cart'])){
            return false;
        }
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        $this->loadView('cart_modal');
        return true;
    }

    public function viewAction(){
        $this->setMeta(___('tpl_cart_title'));
    }

    public function checkoutAction()
    {
        if (!empty($_POST)) {
            // регистрация пользователя, если не авторизован
            if (!User::checkAuth()) {
                $user = new User();
                $user->load();
                if (!$user->validate($user->attributes) || !$user->checkUnique()) {
                    $user->getErrors();
                    $_SESSION['form_data'] = $user->attributes;
                    redirect();
                } else {
                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                    if (!$user_id = $user->save('user')) {
                        $_SESSION['errors'] = ___('cart_checkout_error_register');
                        redirect();
                    }
                }
            }

            // сохраняем заказ
            $data['user_id'] = $user_id ?? $_SESSION['user']['id'];
            $data['note'] = post('note');
            $user_email = $_SESSION['user']['email'] ?? post('email');


            if (!$order_id = Order::saveOrder($data)) {
                $_SESSION['errors'] = ___('cart_checkout_error_save_order');
            } else{
                Order::mailOrder($order_id, $user_email, 'mail_order_user');
                Order::mailOrder($order_id, App::$app->getProperty('admin_email'), 'mail_order_admin');
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
                $_SESSION['success'] = ___('cart_checkout_order_success');
            }

        }
        redirect();
    }


}