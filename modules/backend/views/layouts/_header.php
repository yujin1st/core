<?php
/**
 *
 * @info Core for yii applications with modules
 * @link https://github.com/yujin1st/core
 *
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 *   
 */

/**
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 */

use yii\bootstrap\Nav;
use yujin1st\inspiniatheme\components\NavBar;

/* @var $this \yii\web\View */

?>

<div class="row border-bottom">

  <?php NavBar::begin([
    'brandLabel' => '',
    'renderInnerContainer' => false,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
      'class' => 'navbar',
      'style' => 'margin-bottom: 0'
    ],
  ]); ?>

  <?= Nav::widget([
    'options' => ['class' => 'navbar-nav '],
    'items' => [
    ],
  ]); ?>
  <?= Nav::widget([
    'options' => ['class' => 'nav navbar-top-links navbar-right'],
    'encodeLabels' => false,
    'items' => [
      [
        'label' => '<i class="fa fa-sign-in"></i> Войти',
        'url' => ['/users/security/login'],
        'visible' => Yii::$app->user->isGuest
      ],

      [
        /** @noinspection PhpUndefinedFieldInspection */
        'label' => (!Yii::$app->user->isGuest ? (Yii::$app->user->identity->username) : ''),
        'visible' => !Yii::$app->user->isGuest
      ],

      [
        'label' => ' <i class="fa fa-sign-out"></i> Выйти',
        'url' => ['/users/security/logout'],
        'visible' => !Yii::$app->user->isGuest
      ],
    ],
  ]); ?>
  <?php NavBar::end(); ?>


</div>

