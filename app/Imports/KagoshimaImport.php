<?php

namespace App\Imports;

use App\Models\Home;
use Carbon\Carbon;

class KagoshimaImport extends AbstractImport
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
            'id' => $this->kana($row['事業所番号']),
            'pref_id' => $this->prefId(),
            'name' => $this->kana($row['名称']),
            'company' => $this->kana($row['設置主体']),
            'tel' => $this->kana($row['電話番号']),
            'address' => '鹿児島県'.$this->kana($row['所在地']),
            'area' => $this->kana($row['市区町村'] ?? null),
            'map' => $row['Googleマップ'] ?? null,
            'url' => $row['URL'] ?? null,
            'released_at' => $this->kana($row['開設年月日']),
        ]);
    }
}
