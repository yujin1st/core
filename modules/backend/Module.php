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

namespace yujin1st\core\modules\backend;


use yii;
use yujin1st\core\modules\backend\events\BuildMenuEvent;

/**
 * Backend admin panel module
 *
 * @package yujin1st\core\modules\backend
 */
class Module extends \yujin1st\core\components\Module
{
  public $version = '0.1';
  public $name = 'Панель администратор';

  /* Module properties
  ************************************** */

  /**
   * Set global layout
   *
   * @var bool
   */
  public $setGlobalLayout = false;
  public $globalLayoutPath = '@yujin1st/core/modules/backend/views/layouts';
  public $globalLayout = 'single';

  const EVENT_BUILD_MENU = 'buildMenu';

  /**
   * Collecting side menu over modules
   */
  public function getMenu() {
    $event = new BuildMenuEvent();
    $this->trigger(self::EVENT_BUILD_MENU, $event);
    $menu = [];
    if ($event->header) {
      $menu[] = $event->header;
    }
    foreach ($event->items as $block => $items) {
      foreach ($items as $item) {
        $menu[] = $item;
      }
    }

    return $menu;
  }

  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();

    if ($this->setGlobalLayout) {
      Yii::$app->setLayoutPath($this->globalLayoutPath);
      Yii::$app->layout = $this->globalLayout;
    }

    if ($this->webEnd != 'console') {
      Yii::$app->errorHandler->errorAction = '/backend/site/error';
    }

    $this->controllerNamespace = 'yujin1st\core\modules\backend\controllers';
    $this->setViewPath('@yujin1st/core/modules/backend/views');
  }
}
