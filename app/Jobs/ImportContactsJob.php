<?php

namespace App\Jobs;

use App\Libs\CsvContactsImporter;
use App\Repositories\IContactsRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ImportContactsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $file,$user,$importer,$repository;

    public function __construct($file,$user,CsvContactsImporter $importer,IContactsRepository $repository)
    {
        $this->user = $user;
        $this->file = $file;
        $this->importer = $importer;
        $this->repository = $repository;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = Storage::disk("local")->path("files/".$this->file);
        $this->repository->import($file,$this->user, $this->importer);

    }
}
