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

use yii\helpers\ArrayHelper;
use yujin1st\core\events\RenderEvent;

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

  /** Event for render additional content */
  const EVENT_RENDER = 'moduleRender';

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

  /**
   * Module params
   *
   * @return array
   */
  public function getEditableParams() {
    return [];
  }

  /**
   * Module params labels
   *
   * @return array
   */
  public function getParamsLabels() {
    return [];
  }

  /**
   * @param $key
   * @param $defaultValue
   * @return mixed
   */
  public function getParam($key, $defaultValue = '') {
    /** @noinspection PhpUndefinedFieldInspection */
    return \Yii::$app->settings->get($this->id, $key, $defaultValue);
  }

  /**
   * @param $key
   * @param $value
   * @return mixed
   */
  public function setParam($key, $value) {
    /** @noinspection PhpUndefinedFieldInspection */
    return \Yii::$app->settings->set($this->id, $key, $value);
  }


  public function render($view, $params) {
    $event = \Yii::createObject([
      'class' => RenderEvent::className(),
      'webEnd' => $this->webEnd,
      'view' => $view,
      'form' => ArrayHelper::remove($params, 'form'),
      'model' => ArrayHelper::remove($params, 'model'),
      'params' => $params,
    ]);
    $this->trigger(self::EVENT_RENDER, $event);
    return $event->getRendered();
  }

  /**
   * @param $webEnd string
   * @param $view string
   * @param $function \Closure
   */
  public function setRenderEventHandler($webEnd, $eventView, $view, $params = []) {
    $this->on(self::EVENT_RENDER, function ($event) use ($webEnd, $eventView, $view, $params) {
      /** @var $event RenderEvent */
      if ($event->webEnd == $webEnd && $event->view == $eventView) {
        $event->addRender($view, $params);
      }
    });
  }

}
