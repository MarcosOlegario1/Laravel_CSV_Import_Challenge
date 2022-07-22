<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'first_name' => $row['first_name'],
            'last_name'  => $row['last_name'],
            'email'      => $row['email'],
            'gender'     => $row['gender'],
            'ip_address' => $row['ip_address'],
            'company'    => $row['company'],
            'city'       => $row['city'],
            'title'      => $row['title'],
            'website'    => $row['website'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
