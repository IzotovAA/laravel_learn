<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'import:jsonplaceholder')]
class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     */
    public function handle(ImportDataClient $import): void
    {
        try {
            DB::beginTransaction();

//            $response = $import->client->request('GET', 'posts');
            $response = $import->client->request('GET', 'posts');
            $data = json_decode($response->getBody()->getContents());

            foreach ($data as $item) {
                $post = Post::firstOrCreate([
                    "title" => $item->title,
                ], [
                    'content' => $item->body,
                    'image' => 'jsonplaceholder.jpeg',
                    'category_id' => 1,
                ]);

                $post->tags()->attach([1, 2, 3]);
            }

            DB::commit();

            $this->info('finished');
        } catch (GuzzleException|\Throwable $e) {
            try {
                DB::rollBack();
            } catch (\Throwable $e) {
                $this->error($e->getMessage());
            }

            $this->error($e->getMessage());
        }
    }
}
