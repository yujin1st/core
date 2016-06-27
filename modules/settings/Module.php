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
 *
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 *
 */

namespace yujin1st\core\modules\settings;


use yii;
use yujin1st\core\modules\settings\components\Settings;

/**
 * Module that stores key=>value settings
 *
 * @package yujin1st\core\modules\settings
 */
class Module extends \yujin1st\core\components\Module
{
  public $version = '0.1';
  public $name = 'Settings';

  /* Module properties
  ************************************** */


  public function init() {
    parent::init();
    Yii::$app->set('settings', Settings::className());

    $this->controllerNamespace = 'yujin1st\core\modules\settings\controllers\\' . $this->webEnd;

    $this->setViewPath('@yujin1st/core/modules/settings/views/' . $this->webEnd);

  }

}
