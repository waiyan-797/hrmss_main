<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportSqlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import-sql {file : The path to the SQL file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import an SQL file into the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');

        // Check if the file exists
        if (!file_exists($filePath)) {
            $errorMessage = "The file at path '{$filePath}' does not exist.";
            $this->error($errorMessage);
            Log::error($errorMessage);
            return 1;
        }

        // Read SQL file content
        $sql = file_get_contents($filePath);

        if (!$sql) {
            $errorMessage = "Failed to read the SQL file at '{$filePath}'.";
            $this->error($errorMessage);
            Log::error($errorMessage);
            return 1;
        }

        // Execute the SQL commands
        try {
            DB::unprepared($sql);
            $successMessage = "SQL file '{$filePath}' imported successfully.";
            $this->info($successMessage);
            Log::info($successMessage);
        } catch (\Exception $e) {
            $errorMessage = "Failed to import the SQL file. Error: " . $e->getMessage();
            $this->error($errorMessage);
            Log::error($errorMessage, ['file' => $filePath, 'exception' => $e]);
            return 1;
        }

        return 0;
    }
}
