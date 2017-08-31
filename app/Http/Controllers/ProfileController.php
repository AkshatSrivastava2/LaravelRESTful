<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $client=new \GuzzleHttp\Client;

        $response=$client->request('GET','https://api.linkedin.com/v1/people/~:(id,num-connections,picture-url,location,headline,positions,email-address,summary,formatted-name,public-profile-url)?format=json',
            [
                'headers'=>[
                    'Authorization'=>'Bearer AQW8v5Ra3yyugMeiy35BD_BdPnMviiofRF_oxbUh0PggRBlW-aZkuDKcbwIP1qS1szn_7CiO1kGZFPQ4jiHb4NMLuj9taAduZWnOsA8lnnTzqFQxunJbNwhD9JmsczJg_w3xj4uHIn7dnVh5DqygNQKFDvw1iEHBlF1kfbOX2zxyLoiKiaE',
                ],
            ]);


        $statusCode=$response->getStatusCode();

        if($statusCode!=200)
        {
            return response('Could not retrieve data',401)->header('Content-Type','text/plain');
        }
        else
        {
            $data=$response->getBody();

            return response($data,200)->header('Content-Type','application/json');
        }

    }

    public function store(Request $request)
    {

        $profile=new Profile;

        $profile->email=$request->email;

        $profile->name=$request->name;

        $profile->headline=$request->headline;

        $profile->address_name=$request->address_name;

        $profile->address_code=$request->address_code;

        $profile->profile_url=$request->profile_url;

        $profile->company_name=$request->company_name;

        $profile->company_address=$request->company_address;

        $profile->job_title=$request->job_title;

        $profile->publicProfileUrl=$request->publicProfileUrl;

        $profile->summary=$request->summary;

        if($profile->save())
        {
            return response('Saved Successfully',201);
        }
        else
        {
            return response('Could not save the data',403);
        }
    }

    public function update(Request $request,$id)
    {

        $profile=Profile::find($id);

        $profile->email=$request->email;

        $profile->name=$request->name;

        $profile->headline=$request->headline;

        $profile->address_name="asd";

        $profile->address_code="asd";

        $profile->profile_url="asd";

        $profile->company_name="asd";

        $profile->company_address="asd";

        $profile->job_title="asas";

        $profile->publicProfileUrl="asas";

        $profile->summary="asas";

        if($profile->save())
        {
            return response('Updated Successfully',200);
        }
        else
        {
            return response('Could not save the data',403);
        }
    }

    public function delete($id)
    {
        
    }
}
