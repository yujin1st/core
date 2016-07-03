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
 * @author Evgeniy Bobrov <yujin1st@gmail.com>
 * @link http://yujin1st.ru
 *
 */


namespace yujin1st\core;

use yii\db\ActiveRecord;


/**
 * Class NestedSetsBehavior
 *
 * @package modules\catalog\behaviors
 */
class NestedSetsBehavior extends \creocoder\nestedsets\NestedSetsBehavior
{
  /**
   * Whether use nested sets check or do it manually
   *
   * @var bool
   */
  public $ownDeleteHandler = false;

  /**
   * @var bool|string
   */
  public $parentIdField = false;

  /**
   * Simplifying saving by checking parentId field if operation is not set
   * or modifying field value otherwise
   */
  protected function checkOperation() {
    /** @var ActiveRecord|\creocoder\nestedsets\NestedSetsBehavior $owner */
    $owner = $this->owner;

    if (!in_array($this->operation, [
      self::OPERATION_MAKE_ROOT,
      self::OPERATION_PREPEND_TO,
      self::OPERATION_APPEND_TO,
      self::OPERATION_INSERT_BEFORE,
      self::OPERATION_INSERT_AFTER,
    ])
    ) {
      if ($owner->{$this->parentIdField}) {
        $this->operation = self::OPERATION_APPEND_TO;
        $this->node = $owner::findOne($owner->{$this->parentIdField});
      } else if (!$owner->isRoot()) {
        $owner->{$this->parentIdField} = null;
        $this->operation = self::OPERATION_MAKE_ROOT;
      }
    }

    if ($this->operation == self::OPERATION_MAKE_ROOT) {
      $owner->{$this->parentIdField} = null;
    } else if ($this->node && in_array($this->operation, [
        self::OPERATION_PREPEND_TO,
        self::OPERATION_APPEND_TO,
      ])
    ) {
      $owner->{$this->parentIdField} = $this->node->id;
    } else if ($this->node && in_array($this->operation, [
        self::OPERATION_INSERT_BEFORE,
        self::OPERATION_INSERT_AFTER,
      ])
    ) {
      $owner->{$this->parentIdField} = $this->node->{$this->parentIdField};
    }

  }

  /**
   *
   * @inheritDoc
   */
  public function beforeInsert() {
    if ($this->parentIdField) {
      $this->checkOperation();
    }
    parent::beforeInsert();
  }

  /**
   * @inheritDoc
   */
  public function beforeUpdate() {
    if ($this->parentIdField) {
      $this->checkOperation();
    }
    parent::beforeUpdate();
  }

  /**
   * @inheritDoc
   * @return bool|void
   * @throws \yii\base\NotSupportedException
   * @throws \yii\db\Exception
   */
  public function beforeDelete() {
    if (!$this->ownDeleteHandler) return parent::beforeDelete();
    return true;
  }

  /**
   * @inheritDoc
   * @throws \yii\base\NotSupportedException
   * @throws \yii\db\Exception
   */
  public function afterDelete() {
    if (!$this->ownDeleteHandler) parent::afterDelete();
  }


}
