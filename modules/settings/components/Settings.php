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

namespace yujin1st\core\modules\settings\components;

use yii\base\Component;
use yujin1st\core\modules\settings\models\Setting;

/**
 * Application component that provides settings storage
 */
class Settings extends Component
{
  const CORE = 'core';

  /**
   * @param $key
   * @param bool $create
   * @return Setting
   */
  public function getModel($module, $key, $create = true) {
    $model = Setting::find()->mk($module, $key)->one();
    if (!$model && $create) {
      $model = \Yii::createObject(Setting::className(), [
        'module' => $module,
        'key' => $key,
      ]);
    }
    return $model;
  }

  /**
   * Get parameter
   *
   * @param $modul
   * @param $key
   * @param null $defaultValue
   * @return null
   */
  public function get($module, $key, $defaultValue = null) {
    $model = Setting::find()->mk($module, $key)->one();
    if ($model) return $model->value;
    else return $defaultValue;
  }

  /**
   * Save parameter
   *
   * @param $key
   * @param $value
   */
  public function set($module, $key, $value) {
    $model = $this->getModel($module, $key, true);
    $model->value = $value;
    $model->save(false);
  }

  /**
   * Eraze parameter
   *
   * @param $module
   * @param $key
   * @throws \Exception
   */
  public function clear($module, $key) {
    $model = $this->getModel($module, $key, false);
    if ($model) $model->delete();
  }


}
