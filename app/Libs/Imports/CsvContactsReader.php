<?php
namespace App\Libs\Imports;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithValidation;

class CsvContactsReader implements ToModel, WithCustomCsvSettings, WithValidation
{
    use Importable;
    public function model(array $row)
    {
        return new Contact([
            'name' => $row[0],
            'birth_date' => $row[1],
            'email' => $row[6],
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ","
        ];
    }

    public function rules(): array
    {
        return  [
            '0' => Rule::unique("contacts","name")
        ];
    }
}
