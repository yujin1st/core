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

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yujin1st\inspiniatheme\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <script type="text/javascript">
    <?php if (isset($this->params['jsParams'])): ?>
    var jsParams = <?= json_encode($this->params['jsParams'])?>;
    <?php endif ?>
  </script>
  <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>

<div id="wrapper">

  <?= $this->render('_sidebar') ?>

  <div id="page-wrapper" class="gray-bg">
    <?= $this->render('_header') ?>

    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-sm-8">
        <h2><?= $this->title ?></h2>
        <div class="breadcrumbs">
          <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="title-action">
        </div>
      </div>
    </div>

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


<!-- /.main-container -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
