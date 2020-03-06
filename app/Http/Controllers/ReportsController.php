<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;

class ReportsController extends Controller
{
    //

    /**
    *
    * @return \Illuminate\Http\Response
    *
    */
    public function adquisitions()
    {

    	/*$rows = DB::table('contracts')
    				->join('awards', 'contracts.awards_id', '=', 'awards.id')
    				->join('tenders', 'awards.tenders_id', '=', 'tenders.id')
    				->join('contract_types', 'tenders.contract_types_id', '=', 'contract_types.id')
    				->join('contract_methods', 'tenders.tender_methods_id', '=', 'contract_methods.id')
    				->select('contract_types.type_name', 'contract_methods.method_name', DB::raw('count(*) as contratos'))
    				->groupBy('contract_types.type_name', 'contract_methods.method_name')
    				->get();*/
        $rows = DB::table('tenders')
                        ->join('tender_methods', 'tenders.tender_methods_id', '=', 'tender_methods.id')
                        ->join('contract_types', 'tenders.contract_types_id', '=', 'contract_types.id')
                        ->select('contract_types.type_name', 'tender_methods.method_name', DB::raw('count(*) as contratos'))
                        ->groupBy('contract_types.type_name', 'tender_methods.method_name')
                        ->get();


    	return view('reports.adquisitions', ['rows'=>$rows]);
    }

    /**
    *
    * @return \Illuminate\Http\Response
    *
    */
    public function technicians()
    {
    	$rows = Project::all();
    	return view('reports.technicians', ['rows' => $rows]);
    }

    /**
    *
    * @return \Illuminate\Http\Response
    *
    */
    public function download()
    {
        $rows = Project::all();
        return view('reports.download', ['rows' => $rows]);
    }

    /**
    *
    * @return \Illuminate\Http\Response
    *
    */
    public function suppliers()
    {
    	return view('reports.suppliers');
    }

    /**
    *
    * @return \Illuminate\Http\Response
    *
    */
    public function managment()
    {
    	$projects = ['ended' => 0, 'progress'=>100];

    	return view('reports.managment', ['projects' => $projects]);
    }
}
