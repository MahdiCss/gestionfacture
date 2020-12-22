<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use PDF;
use DateTime;
class DocumentController extends Controller
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
         $document = DB::table('P_ClasseDocument')->whereIn('id',array(111,129,122,121,135))->get();
        
    

         if($request->isJson())
           {
            return response()->json($document);
           }

         return view('doc/listdocument',compact('document'));
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
                   $document = DB::table('P_ClasseDocument')->whereIn('id',array(111,129,122,121,135))->get();
                    $choix=0;
                    

           return view('doc/nvdoc',compact('document','choix'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
       
        $mdoc = DB::table('M_Document')->where('idClasseDocument','=',$id)->get();

        $iddoc = DB::table('P_ClasseDocument')->where('id','=',$id)->get();

        $devise = DB::table('P_Devise')->get();

        $etat = DB::table('E_EtatDocument')->get();

         $users = DB::table('P_utilisateur')->get();

            $cc=0;

            if($request->isJson())
           {
            return response()->json($iddoc);
           }

        
       
           return view('doc/list1document',compact('iddoc','mdoc','devise','etat','users','cc'));
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

        public function orderPdf($idpdf)
 {

     $mdoc = DB::table('M_Document')->where('id','=',$idpdf)->get();
        $idldoc = DB::table('L_LigneDocument')->where('idDocument','=',$idpdf)->get();
        $clients = DB::table('P_tier')->get();
          $devise = DB::table('P_Devise')->get();
    
     $pdf = PDF::loadView('print',compact('mdoc','idldoc','clients','devise'));
     $name = "FactureNo-".$idpdf.".pdf";
     return $pdf->download($name);
 }

 public function listdevise(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

       
         $devis = DB::table('P_Devise')->orderBy('id','asc')->get();

         if($request->isJson())
           {
            return response()->json($devis);
           }

         return view('doc/listdevise',compact('devis'));

 }

 public function ajoutnouvdevise(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

          $this->validate($request,['code'=> 'required'
            ,'lib'=>'required'
            ,'id'=>'required|unique:P_Devise'
            ,'smb'=>'required'
            ,'cav'=>'required'
            ,'tc'=>'required'] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'lib.required' =>'Ce champ est obligatoire*',
             'smb.required' =>'Ce champ est obligatoire*',
             'cav.required' =>'Ce champ est obligatoire*',
             'tc.required' =>'Ce champ est obligatoire*',
             'id.required' =>'Ce champ est obligatoire*',
             'id.unique' =>'Ce numéro éxiste déja*',

            ]


          );

            $stat=Session::get('station');
            $codeusr=Session::get('user_id');
      
              $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;

   DB::table('P_Devise')->insert(array('id' =>$request->id,'code'=>$request->code,'libelle'=>$request->lib,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr,'active'=>'True','chifreAfterV'=>$request->cav,'symbole'=>$request->smb,'tauxChange'=>$request->tc));

               
                 
                 return redirect('/listdevise');
 }

 public function listdeviseedit($id){
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

         $devis=DB::table('P_Devise')->where('id', '=', $id)->get();

         return view('doc/editdevise',compact('devis'));


 }

 public function deviseupdate($id,Request $request){
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
            $this->validate($request,['code'=> 'required'
            ,'lib'=>'required'
            ,'smb'=>'required'
            ,'cav'=>'required'
            ,'tc'=>'required'] ,

            ['code.required' =>'Ce champ est obligatoire*',
             'lib.required' =>'Ce champ est obligatoire*',
             'smb.required' =>'Ce champ est obligatoire*',
             'cav.required' =>'Ce champ est obligatoire*',
             'tc.required' =>'Ce champ est obligatoire*',


            ]


          );




    DB::table('P_Devise')->where('id', '=', $id)->update(array('code' =>$request->code,'libelle'=>$request->lib,'chifreAfterV'=>$request->cav,'symbole'=>$request->smb,'tauxChange'=>$request->tc));
     return redirect('/listdevise');
 }



 public function listdevisedestroy($id){
    if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

        DB::table('P_Devise')->where('id', '=', $id)->update(array('active' =>'False'));

        return redirect('/listdevise');


 }

 public function reactivedevise($id){
    if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

        DB::table('P_Devise')->where('id', '=', $id)->update(array('active' =>'True'));

        return redirect('/listdevise');


 }

 public function listtva(Request $request){

    if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

       
         $tva = DB::table('P_Tva')->orderBy('id','asc')->get();

         if($request->isJson())
           {
            return response()->json($tva);
           }

         return view('doc/listtva',compact('tva'));
 }

 public function ajouttva(Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

          $this->validate($request,['taux'=> 'required'
            ] ,

            ['taux.required' =>'Ce champ est obligatoire*',
            
            ]


          );

            $stat=Session::get('station');
            $codeusr=Session::get('user_id');
       $b=1;
        while($b==1){

       $idtva=  DB::select("Select dbo.getCodes(?,?) AS result",array('P_Tva',$stat));
        
        
     
        foreach($idtva as $a){

        $idtva= $a->result;
        $tva=DB::table('P_Tva')->where('id','=',$a->result)->get();

        if (count($tva)>=1){
                $b=1;
        }else{

              $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;

   DB::table('P_Tva')->insert(array('id' =>$idtva,'tauxTva'=>$request->taux,'j_ddm'=>$date1,'j_codeStation'=>$stat,'j_operation'=>'Insertion','version'=>'1','j_codeUser'=>$codeusr,'j_export'=>'False'));

               

             $codes=DB::table('P_codes')->where('idtable','=','P_Tva')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
                 DB::table('P_codes')->where('idtable','=','P_Tva')->where('idStation','=',$stat)->update(array('num'=>$num));
                 $b=0;
                    }
           
            
                 
                 return redirect('/listtva');

            }
        }  

 }

}
