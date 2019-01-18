<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>
<!-- technology-left -->
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <!-- technology-top -->
                <?php
                if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog): ?>
                        <div class="tc-ch wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <h6>Пользователь: <?= $blog->userName . ' (' . $blog->email . ')' ?>
                                <?php if (!empty($blog->homePage)): ?>
                                    <a href="<?= $blog->homePage ?>">Мой VK</a>
                                <?php endif; ?>
                            </h6>
                            <p><?= $blog->created_at ?></p>
                            <h3><a href="#"><?= $blog->blogTitle ?></a></h3>
                            <?php
                            $tags = explode(" ", $blog->blogTags);
                            ?>
                            <h6>Tags:
                                <?php if (!empty($tags)): ?>
                                    <?php foreach ($tags as $tag): ?>
                                        <a href="<?= Url::to(['blog/search']) ?>?q=<?= $tag ?>" ><?= $tag ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </h6>
                            <p><?= $blog->blogContent ?></p>
                            <div class="soci">
                                <ul>
                                    <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                                    <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                                    <li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>
                                    <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                                    <li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- technology-top -->
            </div>
            <div class="tech-no newBlog">
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right">
            <div class="blo-top1">
                <div class="tech-btm">
                    <div class="search-1 wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                        <form action="<?= Url::to(['blog/search']) ?>" method="get">
                            <input type="text" name="q" placeholder="Поиск...">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="logo wow fadeInDown">
            <p></label>Это все отзывы на сегодня. Приходите завтра, либо оставьте свой!</label></p>
        </div>
        <!-- technology-right -->
        <!--        Если нужна пагинация, просто раскомментируй меня-->
        <!--        --><?php //echo \yii\widgets\LinkPager::widget([
        //            'pagination' => $pages,
        //            'disabledPageCssClass' => 'disabled'
        //        ]); ?>
        <div class="contact-section">
            <h2 class="w3">ОСТАВИТЬ ОТЗЫВ</h2>
            <?php $model = new \app\models\Blog(); ?>
            <?php $form = ActiveForm::begin([
                'id' => 'blog-form',
                'enableAjaxValidation' => false,
                'method' => 'post',
                'action' => 'javascript:void(null);',
            ]) ?>
            <?= $form->field($model, 'userName')->textInput(); ?>
            <?= $form->field($model, 'email')->textInput()->input('email'); ?>
            <?= $form->field($model, 'homePage')->textInput()->input('url'); ?>
            <?= $form->field($model, 'blogTitle')->textInput(); ?>
            <?php
            echo $form->field($model, 'blogContent')->widget(CKEditor::className(), [
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]);
            ?>
            <?= $form->field($model, 'blogTags')->textInput(); ?>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end() ?>
        </div>

    </div>
</div>



