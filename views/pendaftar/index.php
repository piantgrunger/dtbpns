<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PendaftarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pendaftars');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pendaftar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jabatan_id',
            'nik',
            'nama',
            'alamat:ntext',
            //'tempat_lahir',
            //'tanggal_lahir',
            //'jenis_kelamin',
            //'agama',
            //'no_hp',
            //'pendidikan_terakhir',
            //'file_ktp',
            //'file_foto',
            //'file_ijazah',
            //'file_daftar_riwayat_hidup',
            //'file_surat_bebas_penyalahgunaan_narkoba',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
