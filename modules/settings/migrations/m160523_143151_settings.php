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


use yii\db\Migration;

/**
 */
class m160523_143151_settings extends Migration
{
  public function up() {
    $this->createTable('{{%setting}}', [
      'module' => $this->string(),
      'key' => $this->string(),
      'value' => $this->text(),
    ]);
    $this->createIndex('I_Settings_module_key', '{{%setting}}', ['module', 'key'], true);
  }

  public function down() {
    $this->dropIndex('I_Settings_module_key', '{{%setting}}');
    $this->dropTable('{{%setting}}');
  }

}
