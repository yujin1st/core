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
 * Date: 03.07.16
 * Time: 19:58
 */

namespace yujin1st\core\components;

use yujin1st\core\events\BehaviorsEvent;
use yujin1st\core\events\LoadDataEvent;
use yujin1st\core\events\ScenariosEvent;


/**
 * Class ActiveRecord
 *
 * @package yujin1st\core\components
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
  const EVENT_BEFORE_LOAD = 'module_before_load';
  const EVENT_AFTER_LOAD = 'module_after_load';
  const EVENT_BEHAVIORS = 'module_behaviors';
  const EVENT_SCENARIOS = 'module_scenarios';

  /**
   * @var array
   * Cached model scenarios
   * scenarios method call every time model needs validation
   */
  protected $eventScenarios = null;

  /**
   * @param array $data
   * @param null $formName
   * @return bool
   */
  public function beforeLoad($data, $formName = null) {
    $event = new LoadDataEvent();
    $event->formData = $data;
    $event->formName = $formName;
    $this->trigger(self::EVENT_BEFORE_LOAD, $event);
    return $event->isValid;
  }

  /**
   * @param array $data
   * @param null $formName
   * @return bool
   */
  public function afterLoad($data, $formName = null) {
    $event = new LoadDataEvent();
    $event->formData = $data;
    $event->formName = $formName;
    $this->trigger(self::EVENT_AFTER_LOAD, $event);
    return $event->isValid;
  }


  /**
   * @param $module \yujin1st\core\components\Module | \yii\base\Module
   *
   * @return array
   */
  protected function moduleBehaviours($module) {
    $event = new BehaviorsEvent();
    $module->trigger(self::EVENT_BEHAVIORS, $event);
    return $event->behaviors;
  }

  /**
   * @param $module \yujin1st\core\components\Module | \yii\base\Module
   *
   * @return array
   */
  protected function moduleScenarios($module) {
    if ($this->eventScenarios === null) {
      $event = new ScenariosEvent();
      $module->trigger(self::EVENT_SCENARIOS, $event);
      $this->eventScenarios = $event->scenarios;
    }
    return $this->eventScenarios;
  }


}
