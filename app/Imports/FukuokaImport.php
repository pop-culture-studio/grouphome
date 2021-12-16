<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Imports\Concerns\WithKana;
use App\Models\Home;
use App\Models\Pref;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class FukuokaImport implements ToModel, WithHeadingRow, WithUpserts
{
    use Importable;
    use WithImport;
    use WithKana;

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['事業所番号'])) {
            return null;
        }

        return new Home([
            'id' => $row['事業所番号'],
            'pref_id' => Pref::where('key', 'fukuoka')->first()->id,
            'name' => $this->kana($row['事業所－名称']),
            'company' => $this->kana($row['申請者－名称']),
            'tel' => $this->kana($row['事業所－電話番号']),
            'address' => $this->kana($row['事業所－住所']),
            'area' => $row['市区町村'],
            'map' => $row['Googleマップ'],
            'released_at' => $row['指定年月日'],
        ]);
    }
}
