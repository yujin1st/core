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
 *
 */

/* @var $this \yii\web\View */

?>
<?php
/** @var \yujin1st\core\modules\backend\Module $module */
$module = Yii::$app->getModule('backend');
?>

<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <?= \yujin1st\inspiniatheme\components\SidebarNav::widget([
      'encodeLabels' => false,
      'options' => [
        'id' => "side-menu",
        'class' => 'nav metismenu',
      ],
      'items' => $module->getMenu(),
    ]) ?>
  </div>
</nav>

  



