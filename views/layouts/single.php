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
?>
<?php $this->beginContent('@yujin1st/core/views/layouts/main.php'); ?>

<div class="wrapper wrapper-content">
  <div class="ibox">
    <div class="ibox-content">
      <?= $content ?>
    </div>
  </div>
</div>
<?php $this->endContent(); ?>

