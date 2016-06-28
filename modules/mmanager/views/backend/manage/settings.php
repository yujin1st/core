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

/** @var \yii\web\View $this */
/** @var \yujin1st\core\modules\mmanager\models\SettingsForm $model */
/** @var \yujin1st\core\components\Module $module */

$this->title = $module->name . ' ' . Yii::t('app', 'Settings');
?>

<?php $form = \yii\widgets\ActiveForm::begin(); ?>

<?php foreach ($model->module->getEditableParams() as $key => $value): ?>
  <?php if (is_array($value)): ?>
    <?= $form->field($model, "settings[$key]")->label($model->module->getParamsLabels()[$key])->dropDownList($value) ?>
  <?php else: ?>
    <?= $form->field($model, "settings[$value]")->label($model->module->getParamsLabels()[$value])->textInput() ?>
  <?php endif; ?>
<?php endforeach; ?>

<div class="form-group">
  <?= \yii\helpers\Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>


<?php \yii\widgets\ActiveForm::end(); ?>
