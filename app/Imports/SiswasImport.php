<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nomor' => $row['nomor'],
            'meetpath' => $row['meetpath'],
            'federation' => $row['federation'],
            'date' => $row['date'],
            'meetcountry' => $row['meetcountry'],
            'meetstate' => $row['meetstate'],
            'meettown' => $row['meettown'],
            'meetname' => $row['meetname'],
        ]);
    }

    // public function headingRow(): int
    // {
    //     return 2;
    // }
}
