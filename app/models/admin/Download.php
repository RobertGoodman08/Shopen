<?php


namespace app\models\admin;


use app\models\AppModel;
use RedBeanPHP\R;

class Download extends AppModel
{

    public function get_download($lang, $start, $perpage): array
    {
        return R::getAll("SELECT d.*, dd.* FROM download d JOIN download_description dd ON d.id = dd.download_id WHERE dd.language_id = ?
                LIMIT $start, $perpage", [$lang['id']]);
    }



    public function download_validate(): bool
    {
        $errors = '';
        foreach ($_POST['download_description'] as $lang_id => $item) {
            $item['name'] = trim($item['name']);
            if (empty($item['name'])) {
                $errors .= "Не заполнено Наименование во вкладке {$lang_id}<br>";
            }
        }

        if(empty($_FILES) || $_FILES['filename']['error']){
            $errors .= 'Ошибка загрузки файла<br>';
        } else {

            $extensions = ['jpg', 'jpeg', 'png', 'zip', 'pdf', 'txt'];

            $parts = explode('.', $_FILES['filename']['name']);
            $ext = end($parts);


            if(!in_array($ext, $extensions)){
                $errors .= 'Допустимые для загрузки расширения: jpg, jpeg, png, zip, pdf, txt<br>';
            }

        }



        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            return false;
        }
        return true;
    }


    public function upload_file(): array # false
    {

        $file_name = $_FILES['filename']['name'] . uniqid();

        $path = WWW . '/downloads/' . $file_name;
        if(move_uploaded_file($_FILES['filename']['tmp_name'], $path)){
            return [
                'original_name' => $_FILES['filename']['name'],
                'filename' => $file_name,
            ];
        }
        return false;

    }



    public function save_download($data): bool
    {
        R::begin();
        try {
            $download = R::dispense('download');


            $download->filename = $data['filename'];
            $download->original_name = $data['original_name'];
            $download_id = R::store($download);


            foreach ($_POST['download_description'] as $lang_id => $item){
                R::exec("INSERT INTO download_description (download_id, language_id, name) 
                      VALUES (?, ?, ?) ", [
                          $download_id,
                           $lang_id,
                           $item['name'],
                ]);
            }

            R::commit();
            return true;

        } catch (\Exception $e){
            R::rollback();
            return false;
        }

    }


    public function download_delete($id): bool
    {
        $file_name = R::getCell('SELECT filename FROM download WHERE id = ?', [$id]);

        $file_path = WWW . "/downloads/{$file_name}";
        if(file_exists($file_path)){
            R::begin();
            try {

                R::exec("DELETE FROM download_description WHERE download_id = ?", [$id]);
                R::exec("DELETE FROM download WHERE id = ?", [$id]);

                R::commit();
                @unlink($file_path);
                return true;

            }catch (\Exception $e){
                R::rollback();
                return false;
            }
        }
        return false;
    }



}