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
 * Date: 19.06.16
 * Time: 14:32
 */

namespace yujin1st\core\modules\mmanager\helpers;


use yii;

class Manager
{

  /**
   * Register modules in application
   *
   * @param array $modules
   * @param array $params
   */
  public static function registerModules($modules, $params) {
    // initializing
    foreach ($modules as $module => $config) {
      Yii::$app->setModule($module, yii\helpers\ArrayHelper::merge($config, $params));
      Yii::$app->getModule($module, true);
    }

    // post initializing
    foreach (array_keys($modules) as $id) {
      /** @var \yujin1st\core\components\Module $module */
      $module = Yii::$app->getModule($id);
      $module->postInit();
    }

  }
}
