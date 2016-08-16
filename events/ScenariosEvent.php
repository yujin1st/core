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


use yii\base\Event;
use yii\db\ActiveRecord;

/**
 * Event that allows modules proccess data
 *
 * @package yujin1st\core\events
 */
class ScenariosEvent extends Event
{
  /** @var ActiveRecord */
  public $model;
  /** @var  array */
  public $scenarios = [];
}
