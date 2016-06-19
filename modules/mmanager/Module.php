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

namespace yujin1st\core\modules\mmanager;

use yii;
use yujin1st\core\modules\mmanager\helpers\Manager;


/**
 * CMS modules management module
 *
 * @package yujin1st\core\modules\mmanager
 */
class Module extends \yujin1st\core\components\Module
{
  public $version = '0.1';
  public $name = 'Модули';


  /**
   * Register installed and predefined modules
   *
   * @param array $predefinedModules
   */
  public function registerModules($predefinedModules) {
    $modules = $predefinedModules;

    Manager::registerModules($modules, [
      'webEnd' => $this->webEnd,
    ]);
  }

  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();

    $this->controllerNamespace = 'yujin1st\core\modules\mmanager\controllers\\' . $this->webEnd;

    $this->setViewPath('@yujin1st/core/modules/mmanager/views/' . $this->webEnd);

  }

}
