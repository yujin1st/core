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
use yujin1st\core\events\BuildMenuEvent;

/**
 * This is the main module class for Core
 *
 * @property array $modelMap
 *
 */
class Module extends yii\base\Module
{
  const TITLE = 'Ядро';
  const VERSION = '0.0.2-dev';

  const EVENT_BUILD_MENU = 'buildMenu';

  public $webEnd;

  public $controllerNamespace = 'modules\core\controllers\\';

  /**
   * Set global layout
   *
   * @var bool
   */
  public $setGlobalLayout = false;
  public $globalLayoutPath = '@yujin1st/core/views/layouts';
  public $globalLayout = 'single';
  /**
   * additional modules§
   *
   * @var array
   */
  public $appModules = [

  ];

  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();
    $this->bootstrap();
  }


  /**
   * @inheritdoc
   */
  public function registerUrl() {
    Yii::$app->urlManager->addRules([
    ], false);
  }


  /**
   * bootstrapping component
   */
  public function bootstrap() {
    if (!$this->webEnd) throw new InvalidConfigException('Module\'s webEnd property must be configured');
    if ($this->setGlobalLayout) {
      Yii::$app->setLayoutPath($this->globalLayoutPath);
      Yii::$app->layout = $this->globalLayout;
    }
    $this->controllerNamespace = '@yujin1st\core\controllers\\' . $this->webEnd;
    $this->setViewPath('@yujin1st/core/views/' . $this->webEnd);
    $this->registerUrl();

    // loading additional modules
    foreach ($this->appModules as $module => $config) {
      //Yii::$app->setModule($module, $config);
      //Yii::$app->getModule($module);
    }
  }

  /**
   * Collecting side menu over modules
   */
  public function getMenu() {
    $event = new BuildMenuEvent();
    $this->trigger(self::EVENT_BUILD_MENU, $event);
    return $event->items;
  }
}
