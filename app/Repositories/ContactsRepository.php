<?php


namespace App\Repositories;


use App\Libs\IContactsImporter;
use App\Models\Contact;
use App\Models\User;

class ContactsRepository implements IContactsRepository
{

    public function index($limit,$user)
    {
        return Contact::where("user_id",$user)->paginate();
    }


    public function import($file,$user,IContactsImporter $importer)
    {
        $contacts = ($importer->getContacts($file)[0]);
        array_shift($contacts);
        User::find($user)->contacts()->createMany($this->mapData($contacts));

    }

    public function mapData($contacts){
        $collection = collect($contacts);
        $collection->transform(function ($item, $key){
            $copy["name"] = $item[0] ;
            $copy["birth_date"] = $item[1] ;
            $copy["phone_number"] = $item[2] ;
            $copy["address"] = $item[3] ;
            $copy["credit_card"] = encrypt($item[4])  ;
            $copy["credit_card_last_numbers"] = substr($item[4],-4) ;
            $copy["email"] = $item[4] ;
            $copy["franchise"] = "mastercard" ;
            return $copy;
        });
        return $collection->toArray();
    }

}
