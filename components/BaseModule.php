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

namespace yujin1st\core\components;

/**
 * Base class for application modules
 * Don't use this class directly, use yujin1st\core\components\Module
 *
 * @package yujin1st\core\components
 */
class BaseModule extends \yii\base\Module
{

  public $version;
  public $name;
  public $webEnd;

  /**
   *
   * Initialization section, that runs after all modules initialized
   * Use it if you need to access modules events or properties
   */
  public function postInit() {
  }

  /**
   * Module initializations
   */
  public function init() {
  }

}
