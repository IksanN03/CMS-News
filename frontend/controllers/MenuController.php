<?php

namespace frontend\controllers;

use common\models\entity\Menu;
use common\models\entity\News;
use common\models\entity\Submenu;
use common\models\entity\TokenFcm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * LogController implements the CRUD actions for Log model.
 */
class MenuController extends \yii\rest\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Log models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Menu::find()->all();
        $data = [];
        foreach ($model as $model) {
            $submenu = Submenu::find()->where(['menu_id' => $model->id])->all();
            $dataSub = [];
            foreach ($submenu as $submenu) {
                $arrSub = [[
                    'menu' => $submenu->news->title,
                    'news_id' => $submenu->news_id,
                ]];
                $dataSub = array_merge($dataSub, $arrSub);
            }
            $arr = [[
                'menu' => $model->name,
                'title' => $model->news_id ? $model->news->title : '',
                'news_id' => $model->news_id,
                'submenu' => $dataSub
            ]];
            $data = array_merge($arr, $data);
        }

        return json_encode($data);
    }

    public function actionArticles()
    {
        $modelpopular = News::find()->where(['type' => 2])->orderBy('views ASC')->limit(15)->all();
        $popular = [];
        foreach ($modelpopular as $modelpopular) {
            $arr = [[
                'id' => $modelpopular->id,
                'title' => $modelpopular->title,
                'desc' => '',
                'uri' => $modelpopular->photo ? Url::home('http') . Url::to('menu/file-news?id=' . $modelpopular->id) : null
            ]];

            $popular = array_merge($arr, $popular);
        }
        $dataPopular = [['title' => 'Terpopuler', 'horizontal' => true, 'data' => $popular]];

        $modelrecent = News::find()->where(['type' => 2])->orderBy('id ASC')->limit(15)->all();
        $popular = [];
        foreach ($modelrecent as $modelrecent) {
            $arr = [[
                'id' => $modelrecent->id,
                'title' => $modelrecent->title,
                'desc' => $modelrecent->content,
                'uri' => $modelrecent->photo ? Url::home('http') . Url::to('menu/file-news?id=' . $modelrecent->id) : null
            ]];

            $popular = array_merge($arr, $popular);
        }
        $dataRecent = [['title' => 'Recent', 'data' => $popular]];

        $data = array_merge($dataPopular, $dataRecent);

        return json_encode($data);
    }

    public function actionAll()
    {

        $modelrecent = News::find()->where(['type' => 2])->orderBy('id ASC')->limit(50)->all();
        $popular = [];
        foreach ($modelrecent as $modelrecent) {
            $arr = [[
                'id' => $modelrecent->id,
                'title' => $modelrecent->title,
                'desc' => $modelrecent->content,
                'uri' => $modelrecent->photo ? Url::home('http') . Url::to('menu/file-news?id=' . $modelrecent->id) : null
            ]];

            $popular = array_merge($arr, $popular);
        }
        $dataRecent = [['title' => 'Semua Berita & Informasi', 'data' => $popular]];
        return json_encode($dataRecent);
    }
    public function actionDetail($id)
    {
        $model = News::findOne($id);
        $model->views = $model->views + 1;
        $model->save();

        $data = [
            'title' => $model->title,
            'uri' => $model->photo ? Url::home('http') . Url::to('menu/file-news?id=' . $model->id) : null,
            'desc' => $model->content,
            'publish_at' => date('d M Y'),
            'author' => $model->author->name
        ];

        return json_encode($data);
    }

    public function actionFileNews($id, $field = 'photo')
    {
        if ($model = News::findOne($id))
            downloadFile($model, $field, $model->photo);
        else
            echo "file tidak ditemukan";
    }

    public function actionToken($token)
    {
        $model = TokenFcm::find()->where(['token' => $token])->count();
        if ($model == 0) {
            $model = new TokenFcm();
            $model->token = $token;
            $model->save();
        }
    }
}
