<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FMS-A1
 * Date: 06.12.12
 * Time: 18:17
 * To change this template use File | Settings | File Templates.
 */
class FileController extends AdminController
{
    private $expansions = array('gif', 'jpg', 'jpeg', 'png', 'doc', 'pdf', 'docx', 'csv', 'xls', 'rar', 'zip');
    const MAX_SIZE = 6000000;
    const PREFIX_IMG = 'file';

    public function actionUploadImg()
    {
        //номер функции обратного вызова
        $callback = $_GET['CKEditorFuncNum'];

        $error = array();

        $file = $_FILES['upload'];

        if (!is_uploaded_file($file['tmp_name'])) {
            $error[] = 'upload_error';
        }
        if ($file['size'] > self::MAX_SIZE) {
            $error[] = 'incorrect_file_size';
        }
        $nameArray = explode('.', $file['name']);
        $exp = array_pop($nameArray);
        $exp = strtolower($exp);
        if (!in_array($exp, $this->expansions)) {
            $error[] = 'incorrect_expansion';
        }

        $file_name = self::PREFIX_IMG.time().'.'.$exp;

        //указываем куда складывать изображения
        $file_new_name = 'images/uploads/';
        //формируем полный путь к изображению
        $full_path = $file_new_name.$file_name;
        //формируем адрес для атрибута src тега img
        $http_path = '/images/uploads/'.$file_name;

        if(empty($error) && move_uploaded_file($file['tmp_name'], $full_path) ) {}
        else
        {
            $error[] = 'Some error occured please try again later';
            $http_path = '';
        }
        echo "<script type=\"text/javascript\">
                 window.parent.CKEDITOR.tools.callFunction(".$callback.",  \"".$http_path."\", \"".implode('\n',$error)."\" );
             </script>";
    }
}