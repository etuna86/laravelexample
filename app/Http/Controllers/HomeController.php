<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Menu;

class HomeController extends Controller
{
    //
    public function getdata(){
        $users=User::where('id',1)->first();
        $usersAll=User::get();
        $getDataArray=array();
        $getDataArray["name"]=$users->name;
        $getDataArray["email"]=$users->email;
        
        $data = json_encode($getDataArray);
        return $data;
        /*return view('getdata/getdata')->with(['users' => $users , 'usersAll' => $usersAll]);*/
        /*$client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $response = $client->post('url', 
                ['body' => $data]
        );
        $response = json_decode($response->getBody(), true); */
        //$name=$users->name;
        /*return view('getdata/getdata')->with(['users' => $users , 'usersAll' => $usersAll]);   */
    }
    public function insertdata(){
        $users=new User();
        $users->name="erol";
        $users->email="erol@gmail.com";
        $users->password="1234";
        $users->save();
    }

    public function getNumber(){
        $randomNumber=rand(1,12);
        return response()->json($randomNumber);
    }

    public function savePoint(Request $request){
        $mail='test@test.com';
        $requestMail=$request->mail;

        if($mail==$requestMail)
            $result=true;
        else
            $result=false;

        return response()->json($result);
    }

    public function getSignin(Request $request){
       $mail='test@test.com';
        $requestMail=$request->mail;

        if($mail==$requestMail)
            $result=true;
        else
            $result=false;
            
        return response()->json($result);
    }
    public function getLanguage(Request $request){
        $lang=$request->lang;
        //return response()->json($request);
        //return response()->json($request->all());
        //var_dump($lang);
        //$lang='en';
        $menu = DB::table('menu')->where('id', 1)->first();
        //var_dump($menu->rooms_tr);
        /*$rooms=$menu->rooms_.$lang ;
        $dining=$menu->dining_tr;*/
        //var_dump($dining);

        if($lang=='tr'){
            return response()->json(['rooms'=>$menu->rooms_tr ,'dining'=> $menu->dining_tr ,'activities'=> $menu->activities_tr ]);
        }
        else if($lang=='en'){
            return response()->json(['rooms'=>$menu->rooms_en ,'dining'=> $menu->dining_en ,'activities'=> $menu->activities_en ]);
        }

       // $activities=$menu->activities_.$lang ;
        //return response()->json(['rooms'=>$rooms ,'dining'=> $dining ,'activities'=> $activities ]);
    }
}
