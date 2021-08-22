<?php

namespace App\Http\Controllers;

use App\Jobs\ImportContactsJob;
use App\Libs\CsvContactsImporter;
use App\Repositories\ContactsRepository;
use App\Repositories\IContactsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    protected $contactRepository;

    public function __construct(IContactsRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index(Request $request){
        $limit = $request->get("limit",10);
        $users = $this->contactRepository->index($limit,Auth::user()->id);
        return view("contacts.index",["users" => $users]);
    }

    public function import(Request $request){
        $fileName = Carbon::now()->toAtomString().".".$request->file("contacts")->clientExtension();
        $request->file("contacts")->storeAs("files/",$fileName);
        $user = Auth::user()->id;
        ImportContactsJob::dispatch($fileName,$user,new CsvContactsImporter(),$this->contactRepository);
        return redirect()->action([ContactsController::class, 'index']);
    }
}
