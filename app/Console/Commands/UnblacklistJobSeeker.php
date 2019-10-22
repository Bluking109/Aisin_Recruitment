<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UnblacklistJobSeeker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // ini buat scheduler tiap hari, check setiap jobseeker yang telah terblacklist 2 tahun maka makan terunblacklist dan semua history application terhapus karena maksimal melamar adalah 3
    }
}
