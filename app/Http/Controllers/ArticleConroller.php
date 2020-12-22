<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
class ArticleConroller extends Controller
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

         return view('article/listarticle',compact('art'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
                
                $type= DB::table('E_TypeArticle')->where('active','=','True')->get();
                $tva= DB::table('P_Tva')->get();
                $famille= DB::table('P_Famille')->get();
                $marque= DB::table('P_Marque')->get();

                   if($request->isJson()){
            return response()->json($type,$tva,$famille,$marque);
                    }
                

        return view('article/ajoutarticle',compact('type','tva','famille','marque'));
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
            ,'lib'=>'required'
            ,'libc'=>'required'
            ,'mb'=>'required'
            ,'pu'=>'required'
            ,'ch'=>'required'] ,
            ['code.required' =>'ce champ est obligatoire*',
             'lib.required' =>'ce champ est obligatoire*',
             'libc.required'=>'ce champ est obligatoire*',
             'mb.required'=>'ce champ est obligatoire*',
             'pu.required'=>'ce champ est obligatoire*',
             'ch.required'=>'Veuillez choisir une option*',
            ]


          );

       $stat=Session::get('station');
       $b=1;

       while($b==1){

       $idart=  DB::select("Select dbo.getCodes(?,?) AS result",array('P_Article',$stat));
        
     
        foreach($idart as $a){

        $id_art= $a->result;
        $art=DB::table('P_Article')->where('id','=',$a->result)->get();

        if (count($art)>=1){
                $b=1;
        }else{

                if ($request->ch==1){
        DB::table('P_Article')->insert(array('id'=>$id_art,'code'=>$request->code,'version'=>'1','libelle'=>$request->lib,'libelleCourte'=>$request->libc,'margeB'=>$request->mb,'prixuht'=>$request->pu,'qteStock'=>$request->qte,'idTypeArticle'=>$request->typeart,'idFamille'=>$request->famille,'idMarque'=>$request->marque,'idTva'=>$request->taux,'soumisTva'=>'True','active'=>'True'));
            }else{
                 DB::table('P_Article')->insert(array('id'=>$id_art,'code'=>$request->code,'version'=>'1','libelle'=>$request->lib,'libelleCourte'=>$request->libc,'margeB'=>$request->mb,'prixuht'=>$request->pu,'qteStock'=>$request->qte,'idTypeArticle'=>$request->typeart,'idFamille'=>$request->famille,'idMarque'=>$request->marque,'idTva'=>$request->taux,'soumisTva'=>'False','RemiseMax'=>$request->remismax,'active'=>'True'));
            }


             $codes=DB::table('P_codes')->where('idtable','=','P_Article')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
        DB::table('P_codes')->where('idtable','=','P_Article')->where('idStation','=',$stat)->update(array('num'=>$num));
            $b=0;
                 return redirect('listarticle');

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

            $art= DB::table('P_Article')->where('idTypeArticle','=', $id)->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->get();

            $name= DB::table('E_TypeArticle')->where('id','=', $id)->get();

             $famille= DB::table('P_Famille')->get();
                $marque= DB::table('P_Marque')->get();

            if($request->isJson())
           {
            return response()->json($name,$art);
           }
            $b=1;
           return view('article/listptarticle',compact('art','name','b','famille','marque'));


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

         $art= DB::table('P_Article')->where('id','=', $id)->get();
         $type= DB::table('E_TypeArticle')->get();
         $tva= DB::table('P_Tva')->get();


         return view('article/editart',compact('art','type','tva'));
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
                 $this->validate($request,['libart'=>'required'
            ,'libc'=>'required'
            ,'mb'=>'required'
            ,'prixht'=>'required'
            ] ,
            [
             'libart.required' =>'ce champ est obligatoire*',
             'libc.required'=>'ce champ est obligatoire*',
             'mb.required'=>'ce champ est obligatoire*',
             'prixht.required'=>'ce champ est obligatoire*',
             
            ]


          );

        $type= DB::table('E_TypeArticle')->get();
                 $tva= DB::table('P_Tva')->get();

                 foreach ($type as $t){
                    if ($t->id==$request->type){
                        $artname=$t->libelle;
                        $codeart=$t->code;
                    }
                 }

                 foreach ($tva as $tv){
                    if($tv->id==$request->taux){
                        $tauxtva=$tv->tauxTva;
                    }

                 }






     DB::table('P_Article')->where('id', '=', $id)
    ->update(array('code' => $request->codeart,'libelle'=>$request->libart,'libelleCourte'=>$request->libc,'margeB'=>$request->mb,'prixuht'=>$request->prixht,'qteStock'=>$request->qte,'idTypeArticle'=>$request->type,'codeTypeArticle'=>$codeart,'libelleTypeArticle'=>$artname,'idTva'=>$request->taux,'tauxTva'=>$tauxtva));

    return redirect('listarticle/'.$request->type);

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
           
     DB::table('P_Article')->where('id', '=', $id)->update(array('active' =>'False'));

                 if($request->isJson())
           {
                         return response()->json(["Article Désactiver"]);
           }
                    return back();
    }

        public function reactive($id,Request $request)
    {
        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
           
        DB::table('P_Article')->where('id', '=', $id)->update(array('active' =>'True','qteStock'=>0));
        $art=DB::table('P_Article')->where('id', '=', $id)->get();


        
        foreach($art as $a){
        $idtype= $a->idTypeArticle;
                 }
    

                 if($request->isJson())
           {
                         return response()->json(["Article Activer"]);
           }
             return redirect('nonactive/'.$idtype);
    }

    public function nonactiver($id,Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

        $art= DB::table('P_Article')->where('idTypeArticle','=', $id)->where('active','=','False')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->get();

        $famille= DB::table('P_Famille')->get();
                $marque= DB::table('P_Marque')->get();

            $name= DB::table('E_TypeArticle')->where('id','=', $id)->get();

            if($request->isJson())
           {
            return response()->json($name,$art);
           }
           $b=0;
           return view('article/listptarticle',compact('art','name','b','famille','marque'));



    }
    public function parfamille($id,Request $request){

        if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

         $art= DB::table('P_Article')->where('idTypeArticle','=', $id)->where('active','=','False')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->where('idFamille','=',$request->libfam)->get();

        $namefam= DB::table('P_Famille')->where('id','=',$request->libfam)->get();

        $famille= DB::table('P_Famille')->get();

      
       
        $name= DB::table('E_TypeArticle')->where('id','=', $id)->get();
        $b=1;
        return view('article/listptarticle',compact('art','name','b','famille','namefam'));

    }

    public function parmarque($id,Request $request){

         if ((Session::get('authh'))!=null) {
            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

         $art= DB::table('P_Article')->where('idTypeArticle','=', $id)->where('active','=','False')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->where('idFamille','=',$request->libfam)->where('idMarque','=',$request->libmrq)->get();

        $namefam= DB::table('P_Famille')->where('id','=',$request->libfam)->get();

        $namemrq= DB::table('P_Marque')->where('id','=',$request->libmrq)->get();

        $famille= DB::table('P_Famille')->get();

        $name= DB::table('E_TypeArticle')->where('id','=', $id)->get();
        $b=1;
        return view('article/listptarticle',compact('art','name','b','famille','namefam','namemrq'));



    }

}
