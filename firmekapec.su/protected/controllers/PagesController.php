<?php

class PagesController extends Controller
{

    public function actionView($alias) {
            $this->render('view',array(
                    'model'=>$this->loadModel($alias),
                ));
    }

    /**
     * @param integer $id the ID of the model to be loaded
     * @return Page the loaded model
     * @throws CHttpException
     */
    public function loadModel($alias)
    {
        $model=Page::model()->findByAttributes(array('alias' => $alias));
        if($model===null)
            throw new CHttpException(404);
        $this->id_page = $model->id;
        return $model;
    }
}