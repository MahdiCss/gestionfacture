<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use DateTime;
class UtilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)

    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

                   $user=Session::get('user_id');
        $users = DB::table('p_utilisateur')->where('id','!=',$user)->get();

        $type= DB::table('E_TypeUser')->whereIn('id',array(1,112,13))->get();
         $userss = DB::table('p_utilisateur')->get();
        if($request->isJson())
           {
            return response()->json($users,$userss,$type);
           }
        return view('utilisateur/listclient',compact('users','type','userss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                 if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
                $type= DB::table('E_TypeUser')->whereIn('id',array(1,112,13))->get();
                $stat= DB::table('P_Station')->get();

           return view('utilisateur/ajoutclient',compact('type','stat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }


        $this->validate($request,['name'=> 'required|max:255','password'=>'required|confirmed','login'=>'required|max:50|unique:p_utilisateur','code'=>'required']


         );




        $pass = md5($request->password);
           $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;



        DB::table('p_utilisateur')->insert(array('id'=>'2356','version'=>'1','psw'=>$pass,'login'=>$request->login,'nomPrenom' => $request->name, 'mail' => $request->email,'idType'=>$request->role,'j_ddm'=>$date1,'code'=>$request->code,'idStation'=>$request->station,'tel'=>$request->tel,'j_export'=>'False'));

        return redirect('/listclient');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idusr)
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
         
        $users = DB::table('p_utilisateur')->where('id','=',$idusr)->get();
        $type= DB::table('E_TypeUser')->whereIn('id',array(1,112,13))->get();
         return view('utilisateur/edit',compact('users','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

        $this->validate($request,['name'=> 'required|max:255','username'=>'required']


         );
      

        $codeusr=Session::get('user_id');
        $stat=Session::get('station');
        $d = new DateTime();
           

                     DB::table('p_utilisateur')->where('id', '=', $id)
    ->update(array('login' => $request->username,'nomPrenom' => $request->name,'tel' => $request->tel,'mail' => $request->email,'idType' => $request->role,'active' => $request->act,'j_ddm'=>$d,'j_codeUser'=>$codeusr,'j_codeStation'=>$stat));





         return redirect('/listclient');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
                 {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
        
        DB::table('p_utilisateur')->where('id', '=', $id)->delete();

               
                 if($request->isJson())
           {
                         return response()->json([]);
           }
                    return back();
   }
}
