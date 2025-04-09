<?php

namespace App\Console\Commands;

use App\Imports\PostsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from excel';

    /**
     * Execute the console command.
     */
    public function handle(PostsImport $import): void
    {
        $this->output->title('Starting import');
        Excel::import($import->withOutput($this->output), public_path('excel/posts.xls'));
        $this->output->success('Import successful');
    }
}
