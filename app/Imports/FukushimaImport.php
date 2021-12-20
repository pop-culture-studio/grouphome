<?php

namespace App\Imports;

use App\Models\Home;
use Illuminate\Support\Str;

class FukushimaImport extends AbstractImport
{
    /**
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row['事業所番号'])) {
            return null;
        }

        return new Home([
            'id' => $row['事業所番号'],
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['事業所名']),
            'company' => '',
            'tel' => $this->kana($row['事業所電話']),
            'address' => $this->kana($row['事業所所在地1'].$row['事業所所在地2']),
            'area' => $this->kana(Str::replace('福島県', '', $row['事業所所在地1'])),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $row['指定年月日'],
        ]);
    }
}
