<?php

namespace App\Console\Commands;

use App\Exports\PostsExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Exception as WriterException;

class ExportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download data to excel';

    /**
     * Execute the console command.
     */
    public function handle(PostsExport $export): void
    {
        try {
            $this->output->title('Starting export');
            Excel::store($export, 'postsFromDb.xls');
            $this->output->success('Export successful');
        } catch (WriterException|Exception $e) {
            $this->output->error($e->getMessage());
        }
    }
}
