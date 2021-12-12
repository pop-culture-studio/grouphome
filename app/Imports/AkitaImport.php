<?php

namespace App\Imports;

use App\Models\Home;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AkitaImport implements ToModel, WithHeadingRow, WithUpserts
{
    use Importable;

    /**
     * @param  array  $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Home([
            'id'          => $row['事業所番号'],
            'name'        => $row['事業所名'],
            'company'     => $row['事業者名'],
            'address'     => $row['事業所住所'],
            'released_at' => $row['指定年月日'],
        ]);
    }

    public function uniqueBy()
    {
        return 'id';
    }
}
