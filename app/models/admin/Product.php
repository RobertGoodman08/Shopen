<?php


namespace app\models\admin;


use app\models\AppModel;
use fcs\App;
use RedBeanPHP\R;

class Product extends AppModel
{

    public function get_products($lang, $start, $perpage): array
    {
        return R::getAll("SELECT p.*, pd.title FROM product p JOIN product_description pd 
                                on p.id = pd.product_id WHERE pd.language_id = ? LIMIT $start, $perpage", [$lang['id']]);
    }


    public function get_downloads($q): array
    {
        $data = [];
        $downloads = R::getAssoc("SELECT download_id, name FROM download_description WHERE name LIKE ? LIMIT 10",
                ["%{$q}%"]);
        if($downloads){
            $i = 0;
            foreach ($downloads as $id => $title){
                $data['item'][$i]['id'] = $id;
                $data['item'][$i]['text'] = $title;
                $i++;

            }
        }
        return $data;
    }

    public function product_validate(): bool
    {
        $errors = '';
        if(!is_numeric(post('price'))){
            $errors .= "Цена должна быть числовым значением<br>";
        }
        if(!is_numeric(post('old_price'))){
            $errors .= "Старая цена должна быть числовым значением<br>";
        }

        foreach ($_POST['product_description'] as  $lang_id => $item){
            $item['title'] = trim($item['title']);
//            $item['exerpt'] = trim($item['exerpt']);

            if(empty($item['title'])){
                $errors .= "Не заполнено  Наименования во вкладке {$lang_id}<br>";
            }
            if(empty($item['exerpt'])){
                $errors .= "Не заполнено  краткое описания  во вкладке {$lang_id}<br>";
            }
        }


        if($errors){
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;

    }



    public function save_product(): bool
    {
        $lang = App::$app->getProperty('language')['id'];
        R::begin();
        // product
        try {
            $product = R::dispense('product');
            $product->category_id = post('parent_id', 'i');
            $product->price = post('price', 'f');
            $product->old_price = post('old_price', 'f');
            $product->status = post('status') ? 1 : 0;
            $product->hit = post('hit') ? 1 : 0;
            $product->img = post('img') ?: NO_IMAGE;
            $product->is_download = post('is_download') ? 1 : 0;



            $product_id = R::store($product);


            $product->slug = AppModel::create_slug('product', 'slug', $_POST['product_description'][$lang]['title'], $product_id);
            R::store($product);

            // product_description
            foreach ($_POST['product_description'] as $lang_id => $item) {
                R::exec("INSERT INTO product_description (product_id, language_id, 
                                        title, content, exerpt, keywords, description) VALUES (?,?,?,?,?,?,?)", [
                    $product_id,
                    $lang_id,
                    $item['title'],
                    $item['content'],
                    $item['exerpt'],
                    $item['keywords'],
                    $item['description'],
                ]);
            }

            // product_gallery

            if(isset($_POST['gallery']) && is_array($_POST['gallery'])){
                $sql = "INSERT INTO product_gallery (product_id, img) VALUES ";
                foreach ($_POST['gallery'] as $item){
                    $sql .= "({$product_id}, ?),";
                }
                $sql = rtrim($sql, ',');
                R::exec($sql, $_POST['gallery']);
            }


            // product_download

            if($product->is_download){
                $download_id = post('is_download', 'i');
                R::exec("INSERT INTO product_download (product_id, download_id) VALUES (?, ?)", [$product_id, $download_id]);

            }


            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            $_SESSION['form_data'] = $_POST;
            return false;
        }
    }


    public function update_product($id): bool
    {
        R::begin();
        // product
        try {

            $product = R::load('product', $id);
            if(!$product){
                return false;
            }
            $product->category_id = post('parent_id', 'i');
            $product->price = post('price', 'f');
            $product->old_price = post('old_price', 'f');
            $product->status = post('status') ? 1 : 0;
            $product->hit = post('hit') ? 1 : 0;
            $product->img = post('img') ?: NO_IMAGE;
            $product->is_download = post('is_download') ? 1 : 0;

            $product_id = R::store($product);


            // product_description
            foreach ($_POST['product_description'] as $lang_id => $item) {
                R::exec("UPDATE product_description SET title = ?, 
                                content = ?, exerpt = ?, keywords = ?, description = ?  WHERE product_id = ? AND language_id =  ?", [
                    $item['title'],
                    $item['content'],
                    $item['exerpt'],
                    $item['keywords'],
                    $item['description'],
                    $id,
                    $lang_id,
                ]);
            }

            // product_gallery

            if(!isset($_POST['gallery'])) {
                R::exec("DELETE FROM product_gallery WHERE product_id = ?", [$id]);
            }



            if(isset($_POST['gallery']) && is_array($_POST['gallery'])){
                $gallery = self::get_gallery($id);


                if( (count($gallery) != count($_POST['gallery'])) || array_diff($gallery, $_POST['gallery']) ||  array_diff($_POST['gallery'], $gallery)  ){
                    R::exec("DELETE FROM product_gallery WHERE product_id = ?", [$id]);

                    $sql = "INSERT INTO product_gallery (product_id, img) VALUES ";
                    foreach($_POST['gallery'] as $item){
                        $sql .= "({$id}, ?), ";
                    }
                    $sql = rtrim($sql, ',');
                    R::exec($sql, $_POST['gallery']);
                }
            }


            // product_download

            R::exec("DELETE FROM product_download WHERE product_id = ?", [$id]);
            if($product->is_download){
                $download_id = post('is_download', 'i');
                R::exec("INSERT INTO product_download (product_id, download_id) VALUES (?, ?)", [$product_id, $download_id]);

            }


            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }




    public function get_product($id): array #|false
    {
        $product = R::getAssoc("SELECT pd.language_id, pd.*, p.* FROM product_description pd 
                                JOIN product p ON p.id = pd.product_id WHERE pd.product_id = ?", [$id]);

        if(!$product){
            return false;
        }
        $key = key($product);
        if($product[$key]['is_download']){
            $download_info = self::get_product_download($id);
            $product[$key]['download_id'] = $download_info['download_id'];
            $product[$key]['download_name'] = $download_info['name'];
        }
        return $product;
    }

    public function get_product_download($product_id): array
    {
        $lang_id = App::$app->getProperty('language')['id'];
        return R::getRow("SELECT pd.download_id dd.name FROM product_download pd JOIN download_description dd 
                                ON pd.download_id = dd.download_id WHERE pd.product_id = ? AND dd.language_id = ?", [$product_id, $lang_id]);
    }


    public function get_gallery($id): array
    {
        return R::getCol("SELECT img FROM product_gallery WHERE product_id = ?", [$id]);
    }


}