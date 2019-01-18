<?php
/**
 * Created by PhpStorm.
 * User: Алонсо
 * Date: 16.01.2019
 * Time: 14:15
 */

namespace app\controllers;


use app\models\Blog;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Response;
use yii\widgets\ActiveForm;

class BlogController extends AppController
{
    function actionIndex()
    {
        $model = new Blog();
        $query = Blog::find()->distinct();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1000,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $blogs = $query->offset($pages->offset)->limit($pages->limit)->all();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $newBlogInfo = Yii::$app->request->post();
            $this->saveBlog($newBlogInfo);
            return $this->render('index', compact('pages', 'blogs'));
        } else {
            return $this->render('index', compact('pages', 'blogs'));
        }
    }

    function actionAdd()
    {
        $model = new Blog();
        $request = Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->userIP = Yii::$app->request->userIP;
            $model->userBrowser = $this->determineBrowser();
            //$model->save();
            if ($model->save()) {
                return $this->renderAjax('view', [
                    'model' => $model,
                ]);
            }
            else{
                return $this->render('404');
            }
        }
        return $this->render('404');
    }

    function actionSearch()
    {
        $q = Html::encode(Yii::$app->request->get('q'));
        if (!$q) return $this->render('search');
        $queryUserName = Blog::find()->where(['like', 'userName', $q]);
        $queryEmail = Blog::find()->where(['like', 'email', $q]);
        $queryDate = Blog::find()->where(['like', 'created_at', $q]);
        $queryTags = Blog::find()->where(['like', 'blogTags', $q]);
        $query = $queryUserName->union($queryEmail)->union($queryTags)->union($queryDate);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 1000,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $blogs = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('blogs', 'pages', 'q'));
    }

    protected function saveBlog($newBlogInfo)
    {
        if (!empty($newBlogInfo)) {
            $array = $newBlogInfo['Blog'];
            $newBlog = new Blog();
            $newBlog->userIP = Yii::$app->request->userIP;
            $newBlog->userBrowser = $this->determineBrowser();
            $newBlog->userName = $array['userName'];
            $newBlog->homePage = $array['homePage'];
            $newBlog->email = $array['email'];
            $newBlog->blogTitle = $array['blogTitle'];
            $newBlog->blogContent = $array['blogContent'];
            $newBlog->blogTags = $array['blogTags'];
            $newBlog->save();
            return true;
        }else{
            return false;
        }
    }

    protected function determineBrowser()
    {
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
        else $browser = "Неизвестный";
        return $browser;
    }
}