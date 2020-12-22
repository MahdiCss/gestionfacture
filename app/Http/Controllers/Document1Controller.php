<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use DateTime;
use App\lignecom;
class Document1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($id ,Request $request)
    {

               if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

            $mdoc = DB::table('M_Document')->where('id','=',$id)->get();

        $idldoc = DB::table('L_LigneDocument')->where('idDocument','=',$id)->get();
           $devise = DB::table('P_Devise')->get();
            $etat = DB::table('E_EtatDocument')->get();

            foreach ($mdoc as $mm){

        $circuit= DB::table('P_BrancheCircuitDocument')->where('idClasseDocumentPere','=',$mm->idClasseDocument)->whereIn('idClasseDocumentFils',array(111,129,122,121,135))->where('idClasseDocumentFils','!=',$mm->idClasseDocument)->get();
            }
    

            if($request->isJson())
           {
            return response()->json($idmdoc);
           }

           return view('doc/listl_document',compact('mdoc','idldoc','devise','etat','circuit'));
    }


    public function transformation($id,$idmdoc){

               if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }

        $circuit=DB::table('P_BrancheCircuitDocument')->where('id','=',$id)->get();
        $mdoc = DB::table('M_Document')->where('id','=',$idmdoc)->get();
        $ldoc=DB::table('L_LigneDocument')->where('idDocument','=',$idmdoc)->get();

        

        foreach ($circuit as $c){
            $fils=$c->idClasseDocumentFils;
        }


        $classdoc=DB::table('P_ClasseDocument')->where('id','=',$fils)->get();

        foreach($classdoc as $cd){
            $idclass=$cd->id;
            $codeclass=$cd->code;
            $libclass=$cd->libelle;
            $tit=$cd->titre;
            $titclass=$cd->titreImprimable;
    DB::table('M_Document')->where('id', '=', $idmdoc)->update(array('etatTrans' =>'Totalement Transformé en'.$cd->libelle));
        }

 $maxprefix = DB::table('P_PrefixeClasseDocument')->where('id_classeDoc','=',$fils)->max('j_ddm');
 $prefix = DB::table('P_PrefixeClasseDocument')->where('id_classeDoc','=',$fils)->where('j_ddm','=',$maxprefix)->get();
 foreach($prefix as $p){

    $pref=$p->num_seq;
 }


        


       $stat=Session::get('station');
       $b=1;
                         while($b==1){

       $iddoc=  DB::select("Select dbo.getCodes(?,?) AS result",array('M_Document',$stat));
        
        
     
        foreach($iddoc as $a){

        $iddoc= $a->result;
        $doc=DB::table('M_Document')->where('id','=',$a->result)->get();

        if (count($doc)>=1){
                $b=1;
        }else{

           foreach($mdoc as $md){
           if ($fils==135){   
   DB::table('M_Document')->insert(array('id' =>$iddoc,'code'=>$pref,'dateDocument' => $md->dateDocument, 'datecreation' => $md->datecreation, 'j_ddm' => $md->j_ddm, 'idTier' => $md->idTier, 'nomPrenomTier' =>$md->nomPrenomTier, 'adresseTier' =>$md->adresseTier, 'tauxChange' =>$md->tauxChange,'idDevise'=>$md->idDevise, 'version' => '1', 'idClasseDocument' =>$idclass, 'codeClasseDocument' =>$codeclass, 'libelleClasseDocument' =>$libclass, 'titre'=>$tit,'idEtatDocument'=>'12' ,'titreImprimable' =>$titclass,'idStation'=>$stat,'etatTrans'=>'Non Transformé','mntht'=>$md->mntht,'tauxRemise'=>$md->tauxRemise,'mntRemise'=>$md->mntRemise,'mntNetht'=>$md->mntNetht,'mntBrutht'=>$md->mntBrutht,'mntTva'=>$md->mntTva,'mntTtc'=>$md->mntTtc+0.500,'timbre'=>0.500000));
                        }else{
     DB::table('M_Document')->insert(array('id' =>$iddoc,'code'=>$pref,'dateDocument' => $md->dateDocument, 'datecreation' => $md->datecreation, 'j_ddm' => $md->j_ddm, 'idTier' => $md->idTier, 'nomPrenomTier' =>$md->nomPrenomTier, 'adresseTier' =>$md->adresseTier, 'tauxChange' =>$md->tauxChange,'idDevise'=>$md->idDevise, 'version' => '1', 'idClasseDocument' =>$idclass, 'codeClasseDocument' =>$codeclass, 'libelleClasseDocument' =>$libclass, 'titre'=>$tit,'idEtatDocument'=>'12' ,'titreImprimable' =>$titclass,'idStation'=>$stat,'etatTrans'=>'Non Transformé','mntht'=>$md->mntht,'tauxRemise'=>$md->tauxRemise,'mntRemise'=>$md->mntRemise,'mntNetht'=>$md->mntNetht,'mntBrutht'=>$md->mntBrutht,'mntTva'=>$md->mntTva,'mntTtc'=>$md->mntTtc));

                        }
                        }
                    

                        $pre=$pref+1;
     DB::table('P_PrefixeClasseDocument')->where('num_seq','=',$pref)->update(array('num_seq'=>$pre));


             $codes=DB::table('P_codes')->where('idtable','=','M_Document')->where('idStation','=',$stat)->get();

             foreach($codes as $ccc){
             $num=$ccc->num+1;
                }
        
          
                    }
            DB::table('P_codes')->where('idtable','=','M_Document')->where('idStation','=',$stat)->update(array('num'=>$num));
          $b=0;
                 

            }
        }    

    foreach($ldoc as $ld){

       $idldoc=  DB::select("Select dbo.getCodes(?,?) AS result",array('L_LigneDocument',$stat));
        
        
     
        foreach($idldoc as $a){

        $idldoc= $a->result;
        $lldoc=DB::table('L_LigneDocument')->where('id','=',$a->result)->get();

        if (count($lldoc)>=1){
                $b=1;
        }else{

             
   DB::table('L_LigneDocument')->insert(array('id' =>$idldoc,'version'=>'1','idDocument' => $iddoc, 'idArticle' => $ld->idArticle, 'codeArticle' => $ld->codeArticle, 'libelleArticle' => $ld->libelleArticle, 'qte' =>$ld->qte, 'puht' =>$ld->puht, 'puttc' =>$ld->puttc, 'mntht' => $ld->mntht, 'mntTva' =>$ld->mntTva, 'mntNetht' =>$ld->mntNetht, 'assietteTva'=>$ld->assietteTva, 'mntBrutht'=>$ld->mntBrutht,'mntttc'=>$ld->mntttc ,'tauxRemise' =>$ld->tauxRemise,'mntRemise'=>$ld->mntRemise,'tauxTva'=>$ld->tauxTva,'j_ddm'=>$ld->j_ddm,'numordre'=>'1','idStation'=>$stat,'qteRestante'=>0.000,'dateLigne'=>$ld->dateLigne,'idEtatDocument'=>'12'));
                        
                    

             $codes=DB::table('P_codes')->where('idtable','=','L_LigneDocument')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
                    }
            DB::table('P_codes')->where('idtable','=','L_LigneDocument')->where('idStation','=',$stat)->update(array('num'=>$num));
            
            }
   }

   return redirect('listdocument/'.$fils);
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
         
      $mdoc = DB::table('M_Document')->where('id','=',$id)->get();
      $etat = DB::table('E_EtatDocument')->get();
       $idldoc = DB::table('L_LigneDocument')->where('idDocument','=',$id)->get();

         return view('doc/edit',compact('mdoc','etat','idldoc'));
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
    
                DB::table('M_Document')->where('id', '=', $id)
    ->update(array('idEtatDocument' => $request->etat));

                     DB::table('L_LigneDocument')->where('idDocument', '=', $id)
    ->update(array('idEtatDocument' => $request->etat));

        $mdoc = DB::table('M_Document')->where('id','=',$id)->get();

        foreach ($mdoc as $m){
            $class=$m->idClasseDocument;
        }


            

         return redirect('listdocument/'.$class);



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


    public function listldev($id ,Request $request){


                      if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
         $mdoc = DB::table('M_Document')->where('id','=',$id)->get();

            foreach($mdoc as $mc){

                Session::set('tauxdevise',$mc->tauxChange);
               

            }


       

        $idldoc = DB::table('L_LigneDocument')->where('idDocument','=',$id)->get();
         $articles = DB::table('P_Article')->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->get();
    

            if($request->isJson())
           {
            return response()->json($mdoc,$idldoc,$articles);
           }

         return view('doc/ajoutldevis',compact('mdoc','idldoc','articles'));

    }



    public function ajouternouvdev($idmdoc ,Request $request){
               if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }
                    

                $this->validate($request,['codeart'=> 'required','libart'=>'required','qte'=>'required','prixuht'=>'required','remise'=>'required','tva'=>'required'],



                        [
                                   'codeart.required' =>'ce champ est obligatoire*',
                                   'libart.required' =>'ce champ est obligatoire*',
                                   'qte.required'=>'ce champ est obligatoire*',
                                    'prixuht.required'=>'ce champ est obligatoire*',
                                     'remise.required'=>'ce champ est obligatoire*',
                                      'tva.required'=>'ce champ est obligatoire*',




                        ]
         );

         $mdocu= DB::table('M_Document')->where('id','=',$idmdoc)->get();

        

                $quant=0;
                $art= DB::table('P_Article')->where('id','=',$request->codeart)->get();
        if ($request->qte==0){

            Session::set('erreur1',"La quantité saisie doit étre supérieur a 0");

        }else{
        foreach($art as $a){
            if ($request->qte>$a->qteStock){
            Session::set('erreur1',"La quantité saisie est supérieur a celle du stock");
            }else{
                    if ($request->remise>$a->RemiseMax){
                        Session::set('erreur2',"La remise saisie est supérieur au remise max");
                    }else{        
            $quant=$a->qteStock-$request->qte;
     DB::table('P_Article')->where('id', '=',$request->codeart)->update(array('qteStock' => $quant));

          $d = new DateTime();
           $date1 = $d->format('Y-m-d') ;

           $totremis=($request->totnetht*$request->remise)/100;



           
           $lcom = new lignecom('1','1',$idmdoc,$request->codeart,$request->qte,$request->prixuht,$request->totnetht,$request->totnetht,$request->tottva,$request->totnet,$request->totnetht,$request->totttc,$request->remise,$totremis,$request->tva,$date1);                  

           

            
            if (Session::has('lignes')){
                    $kk1=array($lcom);
                    Session::put('lignes',array_merge($kk1,Session::get('lignes')));


            }else{         
                    Session::put('lignes',array($lcom));
            }
            Session::forget('erreur1');
            Session::forget('erreur2');

        }
    }
    }
        }
    

             return redirect('ajoutldevis/'.$idmdoc);
           

    }

}

   
