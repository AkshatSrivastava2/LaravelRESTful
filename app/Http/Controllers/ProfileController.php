<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function index($credentials)
    {
        
        //Saving the credentials into the database


        //retrieving the data from linkedIn
        $client=new \GuzzleHttp\Client;

        $response=$client->request('GET','https://api.linkedin.com/v1/people/~:(id,num-connections,picture-url,location,headline,positions,email-address,summary,formatted-name,public-profile-url)?format=json',
            [
                'headers'=>[
                    'Authorization'=>'Bearer '.$credentials,
                ],
            ]);

        //retrieving the status code of the data received
        $statusCode=$response->getStatusCode();

        //checking the status of the retrieved data
        if($statusCode!=200)
        {
            //return the error message with status code 204
            return response()->json(['message'=>'Could not retrieve data'],204)->header('Content-Type','application/json');
        }
        else
        {
            //retrieving the data of the data received 
            $data=$response->getBody();

            $data=json_decode($data,true);

            //returning the data with status code 200
            return response()->json(['message'=>$data],200)->header('Content-Type','application/json');
        }

    }

    public function store(Request $request)
    {
        //creating a new instance of Profile type
        $profile=new Profile;

        //checking for duplicate email_id
        $emailExist=Profile::all()->where('email',$request->email);

        if(!$emailExist->isEmpty())
        {
            return response()->json(['message'=>'Duplicate email address'],200)->header('Content-Type','application/json');
        }

        //saving the details into the database
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

        // $profile->address_name=$request->address_name;

        // $profile->address_code=$request->address_code;

        // $profile->profile_url=$request->profile_url;

        // $profile->company_name=$request->company_name;

        // $profile->company_address=$request->company_address;

        // $profile->job_title=$request->job_title;

        // $profile->publicProfileUrl=$request->publicProfileUrl;

        // $profile->summary=$request->summary;

        if($profile->save())
        {
            //returning the saved successfully message with status code 201
            return response()->json(['message'=>'Saved Successfully'],201)->header('Content-Type','application/json');
        }
        else
        {
            //returning the error message with status code 403
            return response()->json(['message'=>'Could not save the data'],403)->header('Content-Type','application/json');
        }
    }

    public function edit($id)
    {
        //retrieving the data corresponding to the id
        $profile=Profile::find($id);

        if($profile==null)
        {
            //returning the no data found message with status code 404
            return response()->json(['message'=>'No Data Found'],404)->header('Content-Type','application/json');
        }
        else
        {
            //returning the profile details with status code 200
            return response()->json(['message'=>$profile],200)->header('Content-Type','application/json');
        }
    }

    public function update(Request $request,$id)
    {
        //retrieving the data corresponding to id
        $profile=Profile::find($id);

        //checking for duplicate email_id
        $emailExist=Profile::all()->where('email',$request->email);
        
        if(!$emailExist->isEmpty())
        {
            return response()->json(['message'=>'Duplicate email address'],409)->header('Content-Type','application/json');
        }

        //updating the profile_url
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
            //returning updated successfully message with status code 200
            return response()->json(['message'=>'Updated Successfully'],200)->header('Content-Type','application/json');
        }
        else
        {
            //returning error message with status code 403
            return response()->json(['message'=>'Could not retrieve data'],403)->header('Content-Type','application/json');
        }
    }

    public function destroy($id)
    {
        //retrieving the data corresponding to id
        $profile=Profile::find($id);

        if($profile==null)
        {
            //returning the no data found message with status code 404
            return response()->json(['message'=>'No data found'],404)->header('Content-Type','application/json');
        }
        else
        {
            if($profile->delete())
            {
                //returning successfully deleted message with status code 200
                return response()->json(['message'=>'Successfully Deleted'],200)->header('Content-Type','application/json');
            }
            else
            {
                //returning the error message with status code 403
                return response()->json(['message'=>'Could not retrieve data'],403)->header('Content-Type','application/json');
            }
        }
    }
}
