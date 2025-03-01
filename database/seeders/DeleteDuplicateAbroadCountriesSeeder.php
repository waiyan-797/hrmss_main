<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteDuplicateAbroadCountriesSeeder extends Seeder
{
    public function run()
    {
        // Batch size to process a subset of data at a time (to avoid memory overload)
        $batchSize = 1000;

        // DB::beginTransaction(); // Begin transaction

        try {
            // Start the deletion process
            do {
                // Query to select the duplicate rows (keeping the one with the smallest `id`)
                $duplicates = DB::table('abroad_countries as ac1')
                    ->join('abroad_countries as ac2', function ($join) {
                        $join->on('ac1.abroad_id', '=', 'ac2.abroad_id')
                            ->on('ac1.country_id', '=', 'ac2.country_id')
                            ->where('ac1.id', '>', 'ac2.id');
                    })
                    ->select('ac1.id')
                    ->limit($batchSize)
                    ->get();
                    DB::table('abroad_countries')->whereIn('id', $duplicates->pluck('id'))->delete();

                // if ($duplicates->isNotEmpty()) {
                //     // Log the ids of the rows that are about to be deleted (optional and minimal)
                //     $idsToDelete = $duplicates->pluck('id');
                //     $this->command->info("Deleting batch of " . $idsToDelete->count() . " rows.");

                //     // Delete the duplicate rows in one query
                // }

            } while ($duplicates->isNotEmpty());  // Continue until no more duplicates are found

            // DB::commit(); // Commit the transaction

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback in case of error
            Log::error('Error during batch delete: ' . $e->getMessage());
            $this->command->error('Error during batch delete.');
        }

    }
}
