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

namespace yujin1st\core\events;


use kartik\form\ActiveForm;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Event that allows modules add rendered info to each other
 *
 * @package yujin1st\core\events
 */
class RenderEvent extends Event
{
  /** @var string Current web end */
  public $webEnd;
  /** @var ActiveForm */
  public $form;
  /** @var ActiveRecord */
  public $model;
  /** @var array */
  public $params;
  /** @var string */
  public $view;
  /** @var string */
  public $separator = "\n";

  /**
   * @var array
   */
  protected $_rendered = [];

  /**
   * Puts render content in buffer
   *
   * @param $content
   */
  public function addRendered($content) {
    $this->_rendered[] = $content;
  }

  /**
   * Render file and puts content in buffer
   *
   * @param $viewFile
   * @param $params
   */
  public function addRender($viewFile, $params = []) {
    $params = ArrayHelper::merge([
      'form' => $this->form,
      'model' => $this->model,
    ], $this->params, $params);
    $content = \Yii::$app->view->renderFile($viewFile, $params);
    $this->_rendered[] = $content;
  }


  /**
   * Returns rendered content from buffer
   *
   * @return string
   */
  public function getRendered() {
    return implode($this->separator, $this->_rendered);
  }

}
