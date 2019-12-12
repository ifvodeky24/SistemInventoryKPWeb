<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="UTF-8">
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SISTEM INVENTORY</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.ico?v=1" type="image/x-icon"/>

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

  <!--   <style type="text/css">
    body {
      background-image: url(dashboard1.png);
      /*background-size: 100%;*/
    }
  </style> -->
</head>
<body background="<?= Yii::getAlias('@web') .'/files/images/beton4.png'?>">
 
<!-- <style type="text/css">
    body {
      background-image: url(web/files/images/dashboard1.png);
      background-size: 100%;
    }
  </style> -->
<?php $this->beginBody() ?>
<!--mulai-->
<div class="login-box">

					<!-- Login form -->
					<?= $content?>
					<!-- Login form -->

</div>
<!--akhir-->
<?php $this->endBody() ?>
<!-- </body> -->
</html>
<?php $this->endPage() ?>