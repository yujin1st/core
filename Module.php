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

namespace yujin1st\core;

use yii;
use yii\base\InvalidConfigException;
use yujin1st\core\modules\mmanager\helpers\Manager;

/**
 * This is the main module class for Core
 *
 * @property array $modelMap
 *
 */
class Module extends yii\base\Module
{
  public $version = 'Ядро';
  public $name = '0.1.0-dev';

  public $webEnd;

  /**
   * Core modules that should be run anyway
   *
   * @var array
   */
  private $_coreModules = [
    'msettings' => [
      'class' => 'yujin1st\core\modules\settings\Module',
    ],
    'mmanager' => [
      'class' => 'yujin1st\core\modules\mmanager\Module',
    ],
    'backend' => [
      'class' => 'yujin1st\core\modules\backend\Module',
    ]
  ];

  /**
   * User defined Core modules properties
   *
   * @var array
   */
  public $coreModules = [];

  /**
   * Application Modules that should be run besides mmanager
   *
   * @var array
   */
  public $appModules = [];


  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();
    $this->bootstrap();
  }


  /**
   * Register core modules as app module
   */
  public function registerCoreModules() {
    $modules = yii\helpers\ArrayHelper::merge($this->_coreModules, $this->coreModules);
    Manager::registerModules($modules, [
      'webEnd' => $this->webEnd,
    ]);
  }

  /**
   * Register core modules as app module
   */
  public function registerAppModules() {
    if (Yii::$app->hasModule('mmanager')) {
      /** @var \yujin1st\core\modules\mmanager\Module $manager */
      $manager = Yii::$app->getModule('mmanager');
      $manager->registerModules($this->appModules);
    } else {
      Manager::registerModules($this->appModules, [
        'webEnd' => $this->webEnd,
      ]);
    }
  }

  /**
   * bootstrapping component
   */
  public function bootstrap() {
    if (!$this->webEnd) throw new InvalidConfigException('Module\'s webEnd property must be configured');
    $this->registerCoreModules();
    $this->registerAppModules();
  }


}
