<?php


namespace app\models\admin;


use app\models\AppModel;
use RedBeanPHP\R;
use fcs\App;




class Category extends AppModel
{

    public function category_validate(): bool
    {
        $errors = '';
        foreach ($_POST['category_description'] as $lang_id => $item) {
            $item['title'] = trim($item['title']);
            if (empty($item['title'])) {
                $errors .= "Не заполнено Наименование во вкладке {$lang_id}<br>";
            }
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;
    }

    public function save_category(): bool
    {
        $lang = App::$app->getProperty('language')['id'];
        R::begin();
        try {
            $category = R::dispense('category');
            $category->parent_id = post('parent_id', 'i');
            $category_id = R::store($category);
            $category->slug = AppModel::create_slug('category', 'slug', $_POST['category_description'][$lang]['title'], $category_id);
            R::store($category);

            foreach ($_POST['category_description'] as $lang_id => $item) {
                R::exec("INSERT INTO category_description (category_id, language_id, 
                                        title, description, keywords, content) VALUES (?,?,?,?,?,?)", [
                    $category_id,
                    $lang_id,
                    $item['title'],
                    $item['description'],
                    $item['keywords'],
                    $item['content'],
                ]);
            }
            R::commit();
            return true;
        } catch (\Exception $e) {
            R::rollback();
            return false;
        }
    }

    public function get_category($id): array
    {
        return R::getAssoc("SELECT cd.language_id, cd.*, c.* FROM category_description cd 
                                JOIN category c on c.id = cd.category_id WHERE cd.category_id = ?", [$id]);
    }

}