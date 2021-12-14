<?php

namespace App\Imports;

use App\Imports\Concerns\WithImport;
use App\Imports\Concerns\WithKana;
use App\Models\Home;
use App\Models\Pref;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AomoriImport implements ToModel, WithHeadingRow, WithUpserts
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
        return new Home([
            'id'          => Str::replace('-', '', $row['事業所番号']),
            'pref_id'     => Pref::where('key', 'aomori')->first()->id,
            'name'        => $this->kana($row['事業所名']),
            'company'     => $this->kana($row['設置者']),
            'address'     => $this->kana('青森県'.$row['事業所住所']),
            'released_at' => $row['指定年月日'],
        ]);
    }
}
