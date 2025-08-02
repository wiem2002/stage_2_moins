<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenerateAllModels extends Command
{
    protected $signature = 'make:all-models';
    protected $description = 'Generate Eloquent models for all tables in the database';

    public function handle()
    {
        $tables = DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE'");
        $modelsPath = app_path('Models');

        foreach ($tables as $table) {
            $tableName = $table->TABLE_NAME;
            $className = Str::studly(Str::singular($tableName));
            $filePath = "{$modelsPath}/{$className}.php";

            if (file_exists($filePath)) {
                $this->warn("Model {$className} already exists. Skipping.");
                continue;
            }

            $modelTemplate = "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {$className} extends Model
{
    protected \$connection = 'sqlsrv';
    protected \$table = '{$tableName}';
    public \$timestamps = false;
    protected \$guarded = [];
}
";
            file_put_contents($filePath, $modelTemplate);
            $this->info("Created model: {$className}");
        }
    }
}
