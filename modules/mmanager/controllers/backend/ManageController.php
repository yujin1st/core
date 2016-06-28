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
 * Created by PhpStorm.
 * User: yujin
 * Date: 28.06.16
 * Time: 10:36
 */

namespace yujin1st\core\modules\mmanager\controllers\backend;


use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yujin1st\core\modules\mmanager\models\SettingsForm;

/**
 * Class ManageController
 *
 * @package yujin1st\core\modules\mmanager\controllers\backend
 */
class ManageController extends Controller
{

  public function actionSettings($module) {
    /** @var \yujin1st\core\components\Module $module */
    if (!($module = Yii::$app->getModule($module))) {
      throw new NotFoundHttpException(Yii::t('mmanager.common', 'Setting page for this module is not available!'));
    }

    /** @var SettingsForm $model */
    $model = \Yii::createObject([
      'class' => SettingsForm::className(),
      'module' => $module,
    ]);
    $model->loadValues();


    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      var_dump($model->settings);
      Yii::$app->session->setFlash('success', 'Настройки сохранены');
      //return $this->redirect(['view', 'id' => $model->id]);
    }


    return $this->render('settings', [
      'module' => $module,
      'model' => $model,
    ]);
  }

}
