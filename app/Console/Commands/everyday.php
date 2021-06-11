<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\total_archive;

class everyday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'everyday:insertTotal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'archive total data everyday at 2:00 AM';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counts = DB::select( "SELECT (SELECT COUNT(*) FROM users) as users,
        (SELECT COUNT(*) FROM products) as products, 
        (SELECT COUNT(*) FROM categories) as categories");
       $archive = new total_archive;
       $archive->totalUsers = $counts[0]->users;
       $archive->totalProducts = $counts[0]->products ;
       $archive->totalCategory = $counts[0]->categories;
       $archive->save();
       echo "yes";
    }
}
