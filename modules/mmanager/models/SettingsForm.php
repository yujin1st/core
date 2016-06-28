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
 * Date: 28.06.16
 * Time: 10:54
 */

namespace yujin1st\core\modules\mmanager\models;


use yii;
use yii\base\Model;
use yujin1st\core\components\Module;

class SettingsForm extends Model
{
  /** @var  Module */
  public $module;

  public $settings = [];

  public function rules() {
    return [
      [['settings'], 'safe'],
    ];
  }


  public function attributeLabels() {
    return $this->module->getParamsLabels();
  }

  public function attributes() {
    $attributes = [];
    foreach ($this->module->getEditableParams() as $key => $value) {
      if (is_array($value)) {
        $attributes[] = $key;
      } else {
        $attributes[] = $value;
      }
    }
    return $attributes;
  }

  public function load($data, $formName = null) {
    return parent::load($data, $formName);
  }

  public function save() {
    foreach ($this->attributes() as $attribute) {
      Yii::$app->settings->set($this->module->id, $attribute, isset($this->settings[$attribute]) ? $this->settings[$attribute] : '');
    }
  }

  public function loadValues() {
    foreach ($this->attributes() as $attribute) {
      $this->settings[$attribute] = Yii::$app->settings->get($this->module->id, $attribute);
    }
  }

}
