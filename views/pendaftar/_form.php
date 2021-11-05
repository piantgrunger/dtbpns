<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;

$jabatan = ArrayHelper::map(\app\models\Jabatan::find()->all(),'id','nama');

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaftar-form">

    <?php $form = ActiveForm::begin([
        'id' => 'pendaftar-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'validateOnChange' => false,
        'validateOnBlur' => false,
        'validateOnType' => false,
        'validateOnSubmit' => true,
        'options'   => ['enctype' => 'multipart/form-data'],
        
    ]); ?>

    <?= $form->field($model, 'jabatan_id')->widget(Select2::className(),[
        'data' => $jabatan,
        'options' => ['placeholder' => 'Pilih Formasi'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DateControl::className()) ?>

    <?= $form->field($model, 'jenis_kelamin')->widget(Select2::className(),[
        'data' => ['L' => 'Laki-laki', 'P' => 'Perempuan'],
        'options' => ['placeholder' => 'Pilih Jenis Kelamin'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
  

    <?= $form->field($model, 'agama')->widget(Select2::className(),[
        'data' => ['Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Budha' => 'Budha','Konghuchu' => 'Konghuchu'],
        'options' => ['placeholder' => 'Pilih Agama'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendidikan_terakhir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_surat_lamaran')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_ktp')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_foto')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_ijazah')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_daftar_riwayat_hidup')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_surat_bebas_penyalahgunaan_narkoba')->fileInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'file_dokumen_penunjang')->fileInput(['maxlength' => true]) ?>\

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
