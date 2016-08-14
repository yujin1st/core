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

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $code string */
/* @var $exception Exception */

$this->title = $message;

$this->params['template']['showHeader'] = false;
?>

<div class="middle-box text-center animated fadeInDown">
  <h1>
    <?= $code ?>
  </h1>

  <h3 class="font-bold"><?= $message ?></h3>

  <div class="error-desc">
  </div>
</div>
