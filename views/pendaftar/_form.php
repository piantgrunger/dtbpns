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

    <?= $form->field($model, 'file_surat_lamaran')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_surat_lamaran],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

    <?= $form->field($model, 'file_ktp')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_ktp],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

    <?= $form->field($model, 'file_foto')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_foto],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

    <?= $form->field($model, 'file_ijazah')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_ijazah],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

    <?= $form->field($model, 'file_daftar_riwayat_hidup')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_daftar_riwayat_hidup],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

    <?= $form->field($model, 'file_surat_bebas_penyalahgunaan_narkoba')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_surat_bebas_penyalahgunaan_narkoba],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

     <?= $form->field($model, 'file_dokumen_penunjang')->widget(FileInput::classname(), [
    'options' => ['accept' => 'PDF'],
    'pluginOptions' => [
        'overwriteInitial'=>true,
        'showUpload' => false,
        'initialPreview'=> [
            Url::to(['/document\/'.$model->file_dokumen_penunjang],true),
        ],
        'initialPreviewFileType'=> 'pdf' , // image is the default and can be overridden in config below
   

       // 'initialCaption'=>$model->proposal,
        'initialPreviewAsData'=>true,
    ],
]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
