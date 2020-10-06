<?php

namespace App\Imports;

use App\Budget;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BudgetsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $month = getdate()['mon'];
        return new Budget([
            'category_id' => $row['no'],
            'value' => $row['jumlah'],
            'month_id' => $month,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.jumlah' => 'int|nullable'
        ];
    }
}
