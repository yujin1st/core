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
 * Date: 14.08.16
 * Time: 11:40
 */

namespace yujin1st\core\modules\backend\controllers;

use yii;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\Controller;
use yii\web\HttpException;

class SiteController extends Controller
{
  /**
   * Redefine error message for own styling
   *
   * @return string
   */
  public function actionError() {
    if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
      // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
      $exception = new HttpException(404, Yii::t('yii', 'Page not found'));
    }
    if ($exception instanceof HttpException) {
      $code = $exception->statusCode;
    } else {
      $code = $exception->getCode();
    }
    if ($exception instanceof Exception) {
      $name = $exception->getName();
    } else {
      $name = Yii::t('yii', 'Error');
    }
    if ($code) {
      $name .= " (#$code)";
    }

    if ($exception instanceof UserException) {
      $message = $exception->getMessage();
    } else {
      $message = Yii::t('yii', 'An internal server error occurred');
    }

    if (Yii::$app->getRequest()->getIsAjax()) {
      return "$name: $message";
    } else {
      $this->layout = 'main';
      return $this->render('error', [
        'code' => $code,
        'name' => $name,
        'message' => $message,
        'exception' => $exception,
      ]);
    }
  }
}
