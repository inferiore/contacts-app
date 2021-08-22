<?php
namespace App\Libs;

use App\Libs\Imports\CsvContactsReader;
use Maatwebsite\Excel\Concerns\Importable;

class CsvContactsImporter implements IContactsImporter
{
    public function getContacts($file)
    {

        return  (new CsvContactsReader)->toArray($file);

    }
}
