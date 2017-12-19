<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Whitelist;
use App\Requests;
use Emarref\Jwt\Claim;
use Emarref\Jwt\Token;
use Emarref\Jwt\Jwt;
use Emarref\Jwt\Algorithm\Hs256;
use Emarref\Jwt\Encryption\Factory;

class ApiController extends Controller
{
    public function add()
    {
    	$this->validate(request(), [
    		'username' => 'required',
    		'gamertag' => 'required',
    		'xuid' => 'required',
    		'ip' => 'required',
    		'port' => 'required'
    	]);

    	if($this->verifySession(request()->header('jwt')))
    	{
            //Cover this part of your screen.
            //Seriously, it's kind of bad.
            $checkWhiteList = Whitelist::where('value', request('gamertag'))
                                        ->orWhere('value', request('xuid'))
                                        ->orWhere('value', request('ip'))
                                        ->get();

            $checkDuplicate = Record::where('gamertag', request('gamertag'))
            ->where('xuid', request('xuid'))
            ->where('ip', request('ip'))
            ->get();

            if($checkDuplicate->count() > 0)
            {
                return json_encode(array("success" => true, "extra" => "duplicate entry"));
            }

            if($checkWhiteList->count() > 0)
            {
                return json_encode(array("success" => true, "extra" => "whitelisted"));
            }

    		$record = Record::create([
    			'user_added' => request('username'),
    			'gamertag' => request('gamertag'),
    			'xuid' => request('xuid'),
    			'ip' => request('ip'),
    			'port' => request('port')
    		]);
    		return json_encode(array("success" => true));
    	}
    	else
    	{
    		return json_encode(array("success" => false, "error" => "Sam!_That_is_not_Rubby!"));
    	}
    }

    public function checkSession()
    {
        if($this->verifySession(request()->header('jwt')))
        {
            return json_encode(array("success" => true, "extra" => "Session is valid"));
        }
        else
        {
            Requests::create([
                'from_ip' => request()->ip(),
                'header' => request()->header('jwt'),
                'params' => 'xd',
                'response' => 'bad'
            ]);
            return json_encode(array("success" => false, "error" => "Sam!_That_is_not_Rubby!"));
        }
    }

    public function get()
    {
        if(request('filter') == null || request('value') == null)
            $records = Record::orderByRaw('id desc')->paginate(30, ['*'], 'records');
        else
            $records = Record::where(request('filter'), 'like', '%' . str_replace("+","%20",request('value')) . '%')->orderByRaw('id desc')->paginate(30, ['*'], 'records');
        return json_encode($records);
    }

    public function generateSession() 
    {
    	$token = new Token();
    	$token->addClaim(new Claim\PrivateClaim('username', request('username')));
		//Basic Claims
		$token->addClaim(new Claim\Expiration(new \DateTime('8 Hours')));
		$token->addClaim(new Claim\Issuer('tcm_api'));
		$token->addClaim(new Claim\IssuedAt(new \DateTime('now')));

    	$jwt = new Jwt();
		$algorithm = new Hs256('t$c$m$a$p$i');
		$encryption = Factory::create($algorithm);
		$serializedToken = $jwt->serialize($token, $encryption);
		return json_encode(array("success" => true, "jwt" => $serializedToken));
    }

    public function verifySession($token)
    {
		try 
        {
            $algorithm = new \Emarref\Jwt\Algorithm\Hs256('t$c$m$a$p$i');
            $encryption = \Emarref\Jwt\Encryption\Factory::create($algorithm);
            $jwt = new \Emarref\Jwt\Jwt();

            $token = $jwt->deserialize($token);
            $context = new \Emarref\Jwt\Verification\Context($encryption);
            $context->setIssuer('tcm_api');

            if($jwt->verify($token, $context))
                return true;
            else
                return false;
        }
        catch (\InvalidArgumentException $ex)
        {
            return false;
        }
    }
}
