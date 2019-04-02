<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\MainAsset;
use yii\helpers\Html;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="../images/favicon.png" />
</head>
<body>
<?php $this->beginBody() ?>
    <?=$content?>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>