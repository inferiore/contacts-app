<?php


namespace App\Repositories;



use App\Libs\IContactsImporter;

interface IContactsRepository
{

    public function index($limit,$user);
    public function import($file,$user,IContactsImporter $importer);
    public function mapData($data);

}
