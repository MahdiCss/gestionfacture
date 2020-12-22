<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use DB;
class TiersController extends Controller
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

       
         $tier = DB::table('E_TypeTier')->orderBy('id','asc')->whereIn('id',array(1,9))->get();

         if($request->isJson())
           {
            return response()->json($tier);
           }

         return view('tiers/listtier',compact('tier'));


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
                $type= DB::table('E_TypeTier')->whereIn('id',array(1,9))->get();
                 
                

           return view('tiers/ajouttier',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
              $this->validate($request,['code'=> 'required'
            ,'nom'=>'required'
            ,'ch'=>'required'
            ,'tel1'=>'regex:/^[0-9]{8}$/'
            ,'fax'=>'regex:/^[0-9]{8}$/'] ,
            ['code.required' =>'ce champ est obligatoire*',
             'nom.required' =>'ce champ est obligatoire*',
             'ch.required' =>'Veuillez cochez une case*',
             'tel1.regex' =>'Le numero doit etre 8 chiffres numérique*',
             'fax.required' =>'Le numero doit etre 8 chiffres numérique*',
            ]


          );


           $stat=Session::get('station');
       $b=1;

       while($b==1){

       $idtier=  DB::select("Select dbo.getCodes(?,?) AS result",array('P_tier',$stat));
        $type= DB::table('E_TypeTier')->where('id','=',$request->typetier)->get();
        
     
        foreach($idtier as $a){

        $idtier= $a->result;
        $tier=DB::table('P_tier')->where('id','=',$a->result)->get();

        if (count($tier)>=1){
                $b=1;
        }else{

            foreach($type as $t) {   
    DB::table('P_tier')->insert(array('id'=>$idtier,'code'=>$request->code,'version'=>'1','nomPrenom'=>$request->nom,'adresse'=>$request->adr,'tel'=>$request->tel1,'tel1'=>$request->tel2,'tel2'=>$request->tel3,'fax'=>$request->Fax,'mail'=>$request->email,'idTypeTier'=>$request->typetier,'libelleTypeTier'=>$t->libelle,'codeTypeTier'=>$t->code,'soumisTva'=>$request->ch));
                     }

             $codes=DB::table('P_codes')->where('idtable','=','P_tier')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
            DB::table('P_codes')->where('idtable','=','P_tier')->where('idStation','=',$stat)->update(array('num'=>$num));
            $b=0;
                 return redirect('listtiers');

            }
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
                 if ((Session::get('authh'))!=null) {
                          if (Session::get('authh')!=1){
                
                        return redirect('/');
            }

        }else{
            return redirect('/');
        }
                       
      

                $tiertyp = DB::table('P_tier')->where('idTypeTier','=',$id)->get(); 
          $tiername = DB::table('E_TypeTier')->where('id','=',$id)->get(); 
        

         if($request->isJson())
           {
            return response()->json($tiertyp);
           }

         return view('tiers/listptier',compact('tiertyp','tiername'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
         $tier= DB::table('P_tier')->where('id','=', $id)->get();
         $type= DB::table('E_TypeTier')->whereIn('id',array(1,9))->get();

         
         return view('tiers/edit',compact('tier','type'));        

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
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
          $this->validate($request,['codetier'=>'required'
            ,'libtier'=>'required'
            ] ,
            [
             'codetier.required' =>'ce champ est obligatoire*',
             'libtier.required'=>'ce champ est obligatoire*',
             
            ]


          );



     $modiftier=DB::table('P_tier')->where('id', '=', $id)
    ->update(array('code' => $request->codetier,'nomPrenom'=>$request->libtier,'adresse'=>$request->adr,'tel'=>$request->tel1,'tel1'=>$request->tel2,'tel2'=>$request->tel3,'fax'=>$request->fax,'mail'=>$request->mail,'matriculeFiscal'=>$request->mf,'idTypeTier'=>$request->typetier));

         if($request->isJson())
           {
                         return response()->json($modiftier);
           }

    return redirect('listtiers');



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
           
           DB::table('P_tier')->where('id', '=', $id)->update(array('Active' =>'False'));


                 if($request->isJson())
           {
                         return response()->json(["Tier Supprimer"]);
           }
                    return back();
        
    }

        public function reactivetier($id,Request $request)
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
           
           DB::table('P_tier')->where('id', '=', $id)->update(array('Active' =>'True'));


                 if($request->isJson())
           {
                         return response()->json(["Tier Supprimer"]);
           }
                    return back();
        
    }
}
