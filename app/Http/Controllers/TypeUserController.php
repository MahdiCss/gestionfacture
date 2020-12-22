<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Session;
use DateTime;
class TypeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }       
        $role =DB::table('E_TypeUser')->whereIn('id',array(1,112,13))->get();

        return view('utilisateur/roleuser',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

          $this->validate($request,['code'=> 'required|unique:E_TypeUser'
            ,'nomrole'=>'required'] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'nomrole.required' =>'Ce champ est obligatoire*',
             'code.unique' =>'Ce code éxiste déja*',

            ]


          );

            $stat=Session::get('station');
            $codeusr=Session::get('user_id');
       $b=1;
        while($b==1){

       $idtypeuser=  DB::select("Select dbo.getCodes(?,?) AS result",array('E_TypeUser',$stat));
        
        
     
        foreach($idtypeuser as $a){

        $idtypeuser= $a->result;
        $typeuser=DB::table('E_TypeUser')->where('id','=',$a->result)->get();

        if (count($typeuser)>=1){
                $b=1;
        }else{

              $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;
   DB::table('E_TypeUser')->insert(array('id' =>$idtypeuser,'code'=>$request->code,'libelle'=>$request->nomrole,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr));

               

             $codes=DB::table('P_codes')->where('idtable','=','E_TypeUser')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
                    }
            DB::table('P_codes')->where('idtable','=','E_TypeUser')->where('idStation','=',$stat)->update(array('num'=>$num));
            $b=0;
                 
                 return redirect('/listtypeuser');

            }
        }  




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function listestation(){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        } 

        $station = DB::table('P_Station')->get();

        return view('utilisateur/station',compact('station'));

    }

    public function ajouterstation(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        } 


  $this->validate($request,['code'=> 'required'
            ,'lib'=>'required'
            ,'adr'=>'required'
            ,'tel'=>'required|regex:/^[0-9]{8}$/'
            ,'fax'=>'required|regex:/^[0-9]{8}$/'
            ,'mf'=>'required'




        ] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'lib.required' =>'Ce champ est obligatoire*',
             'adr.required' =>'Ce champ est obligatoire*',
             'tel.required' =>'Ce champ est obligatoire*',
             'tel.regex'=>'Le numero doit etre 8 chiffres numérique*',
             'fax.regex'=>'Le numero doit etre 8 chiffres numérique*',
             'fax.required' =>'Ce champ est obligatoire*',
             'mf.required' =>'Ce champ est obligatoire*',

            ]


          );


   
    $codeusr=Session::get('user_id');
     $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;



    

    $stat=Session::get('station');
       $b=1;

       while($b==1){

       $idstat=  DB::select("Select dbo.getCodes(?,?) AS result",array('P_Station',$stat));
        
     
        foreach($idstat as $a){

        $id_art= $a->result;
        $statt=DB::table('P_Station')->where('id','=',$a->result)->get();

        if (count($statt)>=1){
                $b=1;
        }else{

       DB::table('P_Station')->insert(array('id' =>$idstat,'code'=>$request->code,'libelle'=>$request->lib,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr,'adresse'=>$request->adr,'tel'=>$request->tel,'fax'=>$request->fax,'matfiscal'=>$request->mf,'active'=>'True'));


             $codes=DB::table('P_codes')->where('idtable','=','P_Station')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
        DB::table('P_codes')->where('idtable','=','P_Station')->where('idStation','=',$stat)->update(array('num'=>$num));
            $b=0;
                 return redirect('/liststation');

            }
        }
    }





    }
}
