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

namespace yujin1st\core\modules\settings\models;

use yii;
use yii\db\ActiveRecord;
use yujin1st\core\modules\settings\models\query\SettingQuery;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class Setting extends ActiveRecord
{


  /** Active Record
   ******************************************************************** */

  /**
   * @inheritdoc
   */
  public static function tableName() {
    return 'settings';
  }


  /**
   * @inheritdoc
   * @return SettingQuery the active query used by this AR class.
   */
  public static function find() {
    return new SettingQuery(get_called_class());
  }


}
