<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repository:generate {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate repository interface and implementation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $interfaceContents = "<?php namespace App\Interfaces;\n\ninterface {$name}RepositoryInterface {\n    // Define interface methods here\n}\n";
        $implementationContents = "<?php namespace App\Repositories;\n\nuse App\Interfaces\\{$name}RepositoryInterface;\n\nclass {$name}Repository implements {$name}RepositoryInterface {\n    // Implement repository methods here\n}\n";

        $interfacePath = app_path("Interfaces/{$name}RepositoryInterface.php");
        $implementationPath = app_path("Repositories/{$name}Repository.php");

        file_put_contents($interfacePath, $interfaceContents);
        file_put_contents($implementationPath, $implementationContents);

        $this->info("Repository {$name} created successfully.");
        // Generate interface and implementation files
        // ...

        $this->info('Repository created successfully.');

        // Automatically bind the repository interface and implementation
        app()->bind("App\Interfaces\\".$name."RepositoryInterface.php" , 'App\Repositories\\' . $name.'Repository.php');
    }
}
