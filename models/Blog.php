<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "blog".
 *
 * @property int $blogId
 * @property string $userName
 * @property string $homePage
 * @property string $email
 * @property string $userIP
 * @property string $userBrowser
 * @property string $blogTitle
 * @property string $blogContent
 * @property string $blogTags
 * @property string $created_at
 */
class Blog extends ActiveRecord
{

    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userName', 'email', 'userIP', 'userBrowser', 'blogTitle', 'blogContent', 'blogTags'], 'required'],
            [['blogContent'], 'string'],
            [['created_at'], 'safe'],
            [['userName', 'homePage', 'email', 'userIP', 'userBrowser', 'blogTitle', 'blogTags'], 'string', 'max' => 255],
            ['verifyCode', 'captcha'],
            [['userName', 'email', 'blogTitle','homePage', 'blogTags'], 'filter', 'filter' => '\yii\helpers\HtmlPurifier::process']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userName' => 'Имя пользователя*',
            'email' => 'Email*',
            'homePage' => 'Ссылка на Вашу страницу в VK',
            'blogTitle' => 'Тема*',
            'blogContent' => 'Текст сообщения*',
            'blogTags' => 'Тэги через пробел*',
            'verifyCode' => 'Вы не робот*?',
        ];
    }
}
