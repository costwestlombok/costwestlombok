<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;
use App\OrganizationUnit;
use App\Official;

class CatalogController extends Controller
{
    //

	/**
	*
	*	@param int $sectorID
	*
	*/
    public function get_subsector($sectorID)
    {
    	$rows = Subsector::all()->where("sectors_id", $sectorID);
    	return response()->json($rows);
    }



    /**
	*
	*	@param int $organizationID
	*
	*/
    public function get_units($organizationID)
    {
    	$rows = OrganizationUnit::all()->where("organizations_id", $organizationID);
    	return response()->json($rows);
    }

    /**
	*
	*	@param int $organizationID
	*
	*/
    public function get_officials($organizationID)
    {
    	$rows = Official::all()->where("organizations_id", $organizationID);
    	return response()->json($rows);
    }

}
