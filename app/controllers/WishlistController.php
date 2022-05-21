<?php


namespace app\controllers;


use app\models\Wishlist;
use fcs\App;

/** @property Wishlist $model */
class WishlistController extends  AppController
{


    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $products = $this->model->get_wishlist_products($lang);
        $this->setMeta(___('wishlist_index_title'));
        $this->set(compact('products'));
    }

    public function addAction()
    {
        $id = get('id');
        if (!$id) {
            $answer = ['result' => 'error', 'text' => ___('tpl_wishlist_add_error')];
            exit(json_encode($answer));
        }

        $product = $this->model->get_product($id);
        if ($product) {
            $this->model->add_to_wishlist($id);
            $answer = ['result' => 'success', 'text' => ___('tpl_wishlist_add_success')];
        } else {
            $answer = ['result' => 'error', 'text' => ___('tpl_wishlist_add_error')];
        }
        exit(json_encode($answer));
    }

    public function deleteAction()
    {
        $id = get('id');

        if ($this->model->delete_from_wishlist($id)) {
            $answer = ['result' => 'success', 'text' => ___('tpl_wishlist_delete_success')];
        } else {
            $answer = ['result' => 'error', 'text' => ___('tpl_wishlist_delete_error')];
        }
        exit(json_encode($answer));
    }

}