<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class PublicController extends Controller
{
    public function index()
    {
    	if(request('filter') == null || request('value') == null)
    	   $records = Record::orderByRaw('id desc')->paginate(15, ['*'], 'records');
        else
			$records = Record::where(request('filter'), 'like', '%' . str_replace("+","%20",request('value')) . '%')->orderByRaw('id desc')->paginate(30, ['*'], 'records');    	
		return view('public.index', compact('records'));
    }
}
