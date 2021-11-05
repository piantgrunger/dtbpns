<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */

$this->title = Yii::t('app', 'Pendaftaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
