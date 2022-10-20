<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Test;

use Illuminate\Support\Facades\DB;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:hello';
    // protected $signature = 'hello';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Add New Post';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      // echo "hello world" . PHP_EOL;
      // return 0;

      DB::table('tests')->insert([
        'name' => 'user',
        'created_at' => '2022-04-28 15:00:00',
        'updated_at' => '2022-04-28 15:00:00',
      ]);
        
    }
}
