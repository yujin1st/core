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

/* @var $this \yii\web\View */
/* @var $content string */

$showHeader = isset($this->params['template']['showHeader']) ? $this->params['template']['showHeader'] : true;
?>


<?php $this->beginContent('@yujin1st/core/modules/backend/views/layouts/page.php'); ?>

<div id="wrapper">

  <?= $this->render('_sidebar') ?>

  <div id="page-wrapper" class="gray-bg">
    <?= $this->render('_header') ?>

    <?php if ($showHeader): ?>
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
          <h2><?= $this->title ?></h2>
          <div class="breadcrumbs">
            <?= \yii\widgets\Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="title-action">
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?= $content ?>

    <div class="footer">
      <div class="pull-right">
      </div>
      <div>
        <strong></strong>
      </div>
    </div>
  </div>
</div>

<?php $this->endContent(); ?>
