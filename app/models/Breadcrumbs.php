<?php


namespace app\models;

use fcs\App;

class Breadcrumbs extends AppModel
{

    public static function getBreadcrumbs($category_id, $name = ''): string
    {
        $lang = App::$app->getProperty('language')['code'];
        $categories = App::$app->getProperty("categories_{$lang}");
        $breadcrumbs_array = self::getParts($categories, $category_id);
        $breadcrumbs = "<li class='has-separator'><a href='" . base_url() . "'>" . ___('tpl_home_breadcrumbs') . "</a></li>";
        if ($breadcrumbs_array) {
            foreach ($breadcrumbs_array as $slug => $title) {
                $breadcrumbs .= "<li class='has-separator'><a href='category/{$slug}'>{$title}</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='is-marked'>$name</li>";
        }
        return $breadcrumbs;
    }

    public static function getParts($cats, $id): array|false
    {

        if (!$id) {
            return false;
        }
        $breadcrumbs = [];
        foreach ($cats as $k => $v) {
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['slug']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else {
                break;
            }
        }
        return array_reverse($breadcrumbs, true);

    }




}