<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pendaftar */

$this->title = $model->nik;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pendaftar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Cetak Kartu'), ['cetak', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         
            ['label'=>'Formasi',
            'value'=>function($model){
                return $model->jabatan->nama;
            }],
            ['label'=>'Kualifikasi',
            'value'=>function($model){
                return $model->jabatan->kualifikasi;
            }],
            ['label'=>'Penempatan',
            'value'=>function($model){
                return $model->jabatan->penempatan;
            }],
            'nik',
            'nama',
            'alamat:ntext',
            'tempat_lahir',
            'tanggal_lahir:date',
            [
                'attribute'=>'jenis_kelamin',
                'value'=>function($model){
                    return $model->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
                }
            ],
            
            'agama',
            'no_hp',
            'pendidikan_terakhir',
      
        ],
    ]) ?>

</div>
