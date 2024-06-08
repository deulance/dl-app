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
        ////estado, tipo do bem, preco 1a praca, data 1a praca
        $total_count = Deulance::count();
        $db_columns = get_board_columns();
        $allItems = Deulance::get();
        //$tiposDeBem = Deulance::distinct()->pluck('tipo_de_bem');
        //$estados = Deulance::distinct()->pluck('estado');
        $tiposDeBem = Deulance::distinct()->pluck('tipo_de_bem')->map(function ($tipo) {
            return [
                'value' => $tipo,
                'text' => $tipo,
            ];
        })->toArray();
        $estados = Deulance::distinct()->pluck('estado')->map(function ($estado) {
            return [
                'value' => $estado,
                'text' => $estado,
            ];
        })->toArray();
        array_unshift($estados, ['value' => '', 'text' => 'Selecione']);
        array_unshift($tiposDeBem, ['value' => '', 'text' => 'Selecione']);
        $items=[];
        $labels =[]; 
        $slugs = []; 
        return view('admin.deulanceboard.index', get_defined_vars());
    }
    public function fetch_data(Request $request)
    {
        
        //$allItems = [ Deulance::first() ];

        $query = Deulance::query();

        
        if ($request->has('estado') && trim($request->estado) !== '') {
            $query->where('estado', $request->estado);
        }
    
        if ($request->has('tipoDoBem') && trim($request->tipoDoBem) !== '') {
            $query->where('tipo_de_bem', $request->tipoDoBem);
        }
    
        if ($request->has('startDateFilter') && $request->startDateFilter !== null) {
            $query->where('data_1a_praca', '>=', $request->startDateFilter);
        }
    
        if ($request->has('endDateFilter') && $request->endDateFilter !== null) {
            $query->where('data_1a_praca', '<=', $request->endDateFilter);
        }
    
        $results = $query->get();

        return response()->json($results);
        /*return response()->json([
            
            'deulance_data' => $allItems,
            'total' => 0,
            'itemsCount' => 0,
            'current_page' =>0,
            'last_page' =>  0, 
            'per_page' =>0, 
            'first_id' => 0,
            'last_id' => 0,
            
        ]);*/

       
       
    }
}
   
