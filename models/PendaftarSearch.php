<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendaftar;

/**
 * PendaftarSearch represents the model behind the search form of `app\models\Pendaftar`.
 */
class PendaftarSearch extends Pendaftar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jabatan_id'], 'integer'],
            [['nik', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_hp', 'pendidikan_terakhir', 'file_ktp', 'file_foto', 'file_ijazah', 'file_daftar_riwayat_hidup', 'file_surat_bebas_penyalahgunaan_narkoba', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pendaftar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jabatan_id' => $this->jabatan_id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'pendidikan_terakhir', $this->pendidikan_terakhir])
            ->andFilterWhere(['like', 'file_ktp', $this->file_ktp])
            ->andFilterWhere(['like', 'file_foto', $this->file_foto])
            ->andFilterWhere(['like', 'file_ijazah', $this->file_ijazah])
            ->andFilterWhere(['like', 'file_daftar_riwayat_hidup', $this->file_daftar_riwayat_hidup])
            ->andFilterWhere(['like', 'file_surat_bebas_penyalahgunaan_narkoba', $this->file_surat_bebas_penyalahgunaan_narkoba]);

        return $dataProvider;
    }
}
