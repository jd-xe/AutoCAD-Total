<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $serviceName = $this->argument('name');
        $servicePath = app_path("Services/{$serviceName}.php");

        if (File::exists($servicePath)) {
            $this->error("Service {$serviceName} already exists!");
            return;
        }

        if (!File::isDirectory(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        $serviceContent = <<<EOT
        <?php
        namespace App\Services;

        class {$serviceName}
        {
            /**
             * Constructor del servicio
             */
            public function __construct()
            {
                // Constructor logic here
            }

            /**
             * Ejemplo de método del servicio
             */
            public function exampleMethod()
            {
                return 'Este es un ejemplo de método en el servicio {$serviceName}.';
            }
        }
        EOT;
        File::put($servicePath, $serviceContent);
        $this->info("Service {$serviceName} created successfully at {$servicePath}.");
    }
}
