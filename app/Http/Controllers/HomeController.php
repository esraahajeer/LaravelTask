<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\total_archive;
use App\Models\product;
use Charts;
use Illuminate\Support\Facades\DB;
use App\Charts\SampleTotalChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Model = new total_archive;
        $data = $Model->totla();

        $db =  product::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Day(created_at)"))
                    ->pluck('count');

        $chart = new SampleTotalChart;
        $chart->labels($db->keys());
        $chart->dataset('Products', 'line', $db->values());

        return view('home', ['total'=>$data ,'chart' =>$chart   ]);
    }
}
