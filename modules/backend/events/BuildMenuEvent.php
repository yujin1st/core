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

namespace yujin1st\core\modules\backend\events;

use yii\base\Event;
use yii\helpers\ArrayHelper;

/**
 * Event for gathering menu for backend over other modules
 *
 * @property array $items
 * @property array $header
 */
class BuildMenuEvent extends Event
{
  /** @var array */
  private $_items = [];
  /** @var  array header element */

  private $_header;

  /**
   * @param $header
   */
  public function setHeader($header) {
    $this->_header = $header;
  }

  /**
   * @return array
   */
  public function getHeader() {
    return $this->_header;
  }

  /**
   *
   * @param $items
   * @param $name string
   */
  public function addItems($items, $name = null) {
    if ($name) {
      if (isset($this->_items[$name])) {
        $this->_items[$name] = ArrayHelper::merge($this->_items[$name], $items);
      } else {
        $this->_items[$name] = $items;
      }
    } else {
      $this->_items[] = $items;
    }
  }

  /**
   * @param $name
   * @return mixed|null
   */
  public function getItem($name) {
    return isset($this->_items[$name]) ? $this->_items[$name] : null;
  }

  /**
   * @return mixed|null
   */
  public function getItems() {
    return $this->_items;
  }

}
