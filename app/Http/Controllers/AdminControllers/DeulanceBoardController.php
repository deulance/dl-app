<?php

namespace App\Http\Controllers\AdminControllers;

ini_set('max_execution_time', '0');

use App\Http\Controllers\Controller;
use App\Models\Deulance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeulanceBoardController extends Controller
{

    public function index()
    {
        $total_count = Deulance::count();
        $db_columns = get_board_columns();
       
        $items=[];
        $labels =[]; 
        $slugs = []; 
        return view('admin.deulanceboard.index', get_defined_vars());
    }
    public function fetch_data(Request $request)
    {
        $allItems = Deulance::get();
        return response()->json([
            
            'deulance_data' => $allItems,
            'total' => 0,
            'itemsCount' => 0,
            'current_page' =>0,
            'last_page' =>  0, 
            'per_page' =>0, 
            'first_id' => 0,
            'last_id' => 0,
            
        ]);

       
       
    }
}
   
