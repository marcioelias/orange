<?php

namespace App\Console\Commands;

use App\Services\UserService;
use Illuminate\Console\Command;

class MagnusGetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'magnus:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get MagnusBilling Api data';

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
     * @return int
     */
    public function handle()
    {
        $this->call_services([
            UserService::class
        ]);

        return 0;
    }

    public function call_services($services) {

        foreach($services as $key => $service ) {
            echo "Obtendo dados de ".$service;
            $service_instance = new $service();
            $service_instance->handle();
        }
    }
}
