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
 * @copyright Fastweb
 * @link http://fastweb.ru <info@fastweb.ru>
 */
namespace yujin1st\core\modules\settings\models\query;

use yii\db\ActiveQuery;
use yujin1st\core\modules\settings\models\Setting;

/**
 * This is the ActiveQuery class for [[\common\models\Settings]].
 *
 * @see \common\models\Settings
 */
class SettingQuery extends ActiveQuery
{

  /**
   * @param $module
   * @return SettingQuery
   */
  public function module($module) {
    return $this->andWhere(['module' => $module]);
  }

  /**
   * @param $key
   * @return SettingQuery
   */
  public function key($key) {
    return $this->andWhere(['key' => $key]);
  }

  /**
   * @param $module
   * @param $key
   * @return $this
   */
  public function mk($module, $key) {
    return $this->andWhere(['module' => $module, 'key' => $key]);
  }

  /**
   * @inheritdoc
   * @return Setting|array
   */
  public function all($db = null) {
    return parent::all($db);
  }

  /**
   * @inheritdoc
   * @return Setting|null
   */
  public function one($db = null) {
    return parent::one($db);
  }
}
