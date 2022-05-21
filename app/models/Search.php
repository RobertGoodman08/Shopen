<?php


namespace app\models;


use RedBeanPHP\R;




class Search extends AppModel
{

    public function get_count_find_products($s, $lang): int
    {
        return R::getCell("SELECT COUNT(*) FROM product p JOIN product_description pd on p.id = pd.product_id WHERE p.status = 1 
                    AND pd.language_id = ? AND pd.title LIKE ?", [$lang['id'], "%{$s}%"]);
    }

    public function get_find_products($s, $lang, $start, $perpage): array
    {
        return R::getAll("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id 
                WHERE p.status = 1 AND pd.language_id = ? AND pd.title LIKE ? LIMIT $start, $perpage", [$lang['id'], "%{$s}%"]);
    }

}