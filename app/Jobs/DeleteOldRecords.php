<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\transfer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DeleteOldRecords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Define the logic to delete records older than 3 days
        $thresholdDate = Carbon::now()->subDays(3);

        // Retrieve records older than 3 days
        $oldRecords = transfer::where('created_at', '<', $thresholdDate)->get();

        foreach ($oldRecords as $record) {
            // Delete the file from storage
            if (Storage::disk('public')->exists($record->file_path)) {
                Storage::disk('public')->delete($record->file_path);
            }

            // Delete the record from the database
            $record->delete();
        }
    }
}