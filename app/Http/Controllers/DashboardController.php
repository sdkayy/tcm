<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\User;
use App\Whitelist;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        if(auth()->user()->admin_level < 0) {
            return redirect('/accounts/password');
        }
        if(request('filter') == null || request('value') == null)
    	   $records = Record::orderByRaw('id desc')->paginate(10, ['*'], 'records');
        else
            $records = Record::where(request('filter'), 'like', '%' . str_replace(" ","%20",request('value')) . '%')->orderByRaw('id desc')->paginate(10, ['*'], 'records');
        $lastFive = Record::orderByRaw('id desc')->take(5)->get();
    	$recordCount = Record::all()->count();
    	$recordHCount = Record::LastHour()->count();
    	$recordYCount = Record::LastDay()->count();
    	return view('dashboard.index', compact(['records', 'recordCount', 'recordHCount', 'recordYCount', 'lastFive']));
    }

    public function manage()
    {
        if(auth()->user()->admin_level < 2)
        {
            $type = 'danger';
            $message = 'AYY! You no sposed to be here my friend!';
            $icon = 'ti-hand-stop';
            return redirect('dashboard')->with(compact(['type', 'message', 'icon']));
        }
        $admins = User::where('id', '>', '0')->paginate(10, ['*'], 'admins');
        $lastFive = Record::orderByRaw('id desc')->take(5)->get();
        $whitelists = Whitelist::where('id', '>', '0')-> paginate(10, ['*'], 'whitelist');
        return view('dashboard.manage', compact(['admins', 'lastFive', 'whitelists']));
    }

    public function delete($record_id)
    {
        $record = Record::where('id', '=', $record_id);
        $record->forceDelete();
        $type = 'success';
        $message = 'Success! Record Deleted!';
        $icon = 'ti-check';
        return redirect()->back()->with(compact(['type', 'message', 'icon']));
    }

    public function addWhitelist()
    {
        $this->validate(request(), [
            'field' => 'required',
            'value' => 'required'
        ]);

        $whitelist = Whitelist::create([
            'field' => request('field'),
            'value' => request('value'),
            'admin_id' => auth()->user()->id
        ]);
        $type = 'success';
        $message = 'Success! Whitelist added!';
        $icon = 'ti-check';
        return redirect()->back()->with(compact(['type', 'message', 'icon']));
    }

    public function removeWhitelist($whitelist_id)
    {
        $admin = Whitelist::where('id', '=', $whitelist_id);
        $admin->forceDelete();
        $type = 'success';
        $message = 'Success! Whitelist Removed!';
        $icon = 'ti-check';
        return redirect()->back()->with(compact(['type', 'message', 'icon']));
    }

    public function mass()
    {
        $this->validate(request(), [
            'field' => 'required',
            'value' => 'required'
        ]);

        $records = Record::where(request('field'), '=', request('value'));
        $records->forceDelete();
        $type = 'success';
        $message = 'Success! Records Deleted!';
        $icon = 'ti-check';
        return redirect()->back()->with(compact(['type', 'message', 'icon']));
    }

    public function addAdmin() 
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|confirmed',
            'level' => 'required|numeric'
        ]);

        $user = User::create([
            'username' => request('username'),
            'email' => 'x@x' . rand(0, 100000),
            'password' => bcrypt(request('password')),
            'admin_level' => request('level')
        ]);

        $type = 'success';
        $message = 'Success! Admin created!';
        $icon = 'ti-check';
        return redirect()->back()->with(compact(['type', 'message', 'icon']));
    }

    public function removeAdmin($admin_id)
    {
        $admin = User::where('id', '=', $admin_id);
        $admin->forceDelete();
        $type = 'success';
        $message = 'Success! Admin Removed!';
        $icon = 'ti-check';
        return redirect()->back()->with(compact(['type', 'message', 'icon']));
    }
}
