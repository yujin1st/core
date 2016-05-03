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
use yii\base\BootstrapInterface;

/**
 * Bootstrap class registers module and user application component.
 * It also creates some url rules which will be applied when UrlManager.enablePrettyUrl is enabled.
 *
 */
class Bootstrap implements BootstrapInterface
{

  /** @inheritdoc */
  public function bootstrap($app) {
    /** @var Module $module */
    if ($app->hasModule('core') && ($module = $app->getModule('core')) instanceof Module) {
      $module->bootstrap();
    }
  }
}
