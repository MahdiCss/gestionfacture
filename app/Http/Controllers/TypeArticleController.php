<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use DB;
use DateTime;

class TypeArticleController extends Controller
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

       
         $art = DB::table('E_TypeArticle')->orderBy('id','asc')->where('active','=','True')->get();

         if($request->isJson())
           {
            return response()->json($art);
           }

         return view('article/ajouttypearticle',compact('art'));
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

          $this->validate($request,['code'=> 'required'
            ,'nomtype'=>'required'
            ,'id'=>'required|unique:E_TypeArticle'] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'nomtype.required' =>'Ce champ est obligatoire*',
             'id.required' =>'Ce champ est obligatoire*',
             'id.unique' =>'Ce numéro éxiste déja*',

            ]


          );

            $stat=Session::get('station');
            $codeusr=Session::get('user_id');
      
              $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;

   DB::table('E_TypeArticle')->insert(array('id' =>$request->id,'code'=>$request->code,'libelle'=>$request->nomtype,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr,'active'=>'True'));

               
                 
                 return redirect('/listtypearticle');


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

    public function listfamille(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

       
         $fam = DB::table('P_Famille')->orderBy('id','asc')->get();

         if($request->isJson())
           {
            return response()->json($art);
           }

         return view('article/listfamille',compact('fam'));


    }

    public function ajoutfamille(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }        

          $this->validate($request,['code'=> 'required|unique:P_Famille'
            ,'nomfamille'=>'required'] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'nomfamille.required' =>'Ce champ est obligatoire*',
             'code.unique'=>'Ce code éxiste déja*',
            ]


          );

            $stat=Session::get('station');
            $codeusr=Session::get('user_id');
       $b=1;
        while($b==1){

       $idfam=  DB::select("Select dbo.getCodes(?,?) AS result",array('P_Famille',$stat));
        
        
     
        foreach($idfam as $a){

        $idfam= $a->result;
        $fam=DB::table('P_Famille')->where('id','=',$a->result)->get();

        if (count($fam)>=1){
                $b=1;
        }else{

              $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;
   DB::table('P_Famille')->insert(array('id' =>$idfam,'code'=>$request->code,'libelle'=>$request->nomrole,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr));

               

             $codes=DB::table('P_codes')->where('idtable','=','P_Famille')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
                    }
            DB::table('P_codes')->where('idtable','=','P_Famille')->where('idStation','=',$stat)->update(array('num'=>$num));
            $b=0;
                 
                 return redirect('/listfamille');

            }
        }          
    }

    public function listmarque(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

       
         $mrq = DB::table('P_Marque')->orderBy('id','asc')->get();

         if($request->isJson())
           {
            return response()->json($art);
           }

         return view('article/listmarque',compact('mrq'));


    }
    public function ajoutmarque(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }        

          $this->validate($request,['code'=> 'required|unique:P_Marque'
            ,'nommarque'=>'required'] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'nommarque.required' =>'Ce champ est obligatoire*',
             'code.unique'=>'Ce code éxiste déja*',
            ]


          );

            $stat=Session::get('station');
            $codeusr=Session::get('user_id');
       $b=1;
        while($b==1){

       $idmrq=  DB::select("Select dbo.getCodes(?,?) AS result",array('P_Marque',$stat));
        
        
     
        foreach($idmrq as $a){

        $idmrq= $a->result;
        $mrq=DB::table('P_Marque')->where('id','=',$a->result)->get();

        if (count($mrq)>=1){
                $b=1;
        }else{

              $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;
   DB::table('P_Marque')->insert(array('id' =>$idmrq,'code'=>$request->code,'libelle'=>$request->nommarque,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr));

               

             $codes=DB::table('P_codes')->where('idtable','=','P_Marque')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
                    }
            DB::table('P_codes')->where('idtable','=','P_Marque')->where('idStation','=',$stat)->update(array('num'=>$num));
            $b=0;
                 
                 return redirect('/listmarque');

            }
        }   




    }
}
