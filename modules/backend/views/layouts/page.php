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


<body <?= isset($this->params['template']['bodyClass']) ? ('class="' . $this->params['template']['bodyClass'] . '"') : '' ?>>
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
