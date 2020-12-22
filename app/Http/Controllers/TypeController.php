<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
class TypeController extends Controller
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
    public function create(Request $request)
    {

               if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }



         $clients = DB::table('P_tier')->whereIn('idTypeTier',array(1,9))->where('Active','=','True')->get();

         $iddoc=$request->doc;

         $maxprefix = DB::table('P_PrefixeClasseDocument')->where('id_classeDoc','=',$iddoc)->max('j_ddm');
 $prefix = DB::table('P_PrefixeClasseDocument')->where('id_classeDoc','=',$iddoc)->where('j_ddm','=',$maxprefix)->get();
         $choix=1;


           $devise = DB::table('P_Devise')->where('active','=','True')->get(); 




         $document = DB::table('P_ClasseDocument')->whereIn('id',array(111,129,122,121,135))->get(); 

        $docname = DB::table('P_ClasseDocument')->where('id','=',$iddoc)->get(); 

        return view('doc/nvdoc',compact('document','choix','prefix','clients','iddoc','docname','devise'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
                
                  if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }


        $this->validate($request,['codeclt'=> 'required','libclt'=>'required','tauxdevis'=>'required'],



                        [
                                   'codeclt.required' =>'le numero client est obligatoire',
                                   'libclt.required' =>'le nom du client est obligatoire',
                                   'tauxdevis.required'=>'le Taux est obligatoire',




                        ]
         );

        if ($request->hide==""){
                $dev=11;
        }else{
            $dev=$request->hide;
        }

                     $classdoc = DB::table('P_ClasseDocument')->where('id','=',$id)->get();  
                     foreach ($classdoc as $dd) {
                        $codeclass=$dd->code;
                        $libclass=$dd->libelle;
                        $titclass=$dd->titre;
                        $idclass=$dd->id;
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

             
   DB::table('M_Document')->insert(array('id' =>$iddoc,'code'=>'00'.$request->codepre,'dateDocument' => $request->datedevis, 'datecreation' => $request->datedevis, 'j_ddm' => $request->datedevis, 'idTier' => $request->codeclt, 'nomPrenomTier' =>$request->libclt, 'adresseTier' =>$request->ville, 'tauxChange' =>$request->tauxdevis,'idDevise'=>$dev, 'version' => '1', 'idClasseDocument' =>$idclass, 'codeClasseDocument' =>$codeclass, 'libelleClasseDocument' =>$libclass, 'titre' =>$dd->titre,'idEtatDocument'=>'11' ,'titreImprimable' =>$titclass,'idStation'=>$stat,'etatTrans'=>'Non Transformé'));

                    Session::set('tauxdevise',$request->tauxdevis);

                        $pre=$request->codepre+1;
     $prefix = DB::table('P_PrefixeClasseDocument')->where('num_seq','=',$request->codepre)->update(array('num_seq'=>$pre));


                     

             $codes=DB::table('P_codes')->where('idtable','=','M_Document')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
                 DB::table('P_codes')->where('idtable','=','M_Document')->where('idStation','=',$stat)->update(array('num'=>$num));
                   $b=0;
                    }
           
          
                 return redirect('ajoutldevis/'.$iddoc);

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
    public function creation($id){

         if ((Session::get('authh'))!=null) {

            if (Session::get('authh')!=1){
                
                        return redirect('/');
            }
        }else{
            return redirect('/');
        }


                $stat=Session::get('station');
                $tauxdev=Session::get('tauxdevise');

                $het= DB::table('M_Document')->where('id','=',$id)->get();

                foreach($het as $h){
                    $idclass=$h->idClasseDocument;
                    if ($h->mntTtc==0){
                        
                        $totmntht=0;
                        $totmntttc=0;
                        $totmntnetht=0;
                        $totmnttva=0;
                        $totmntremis=0;


                    }else{
                        $totmntht=$h->mntht;
                        $totmntttc=$h->mntTtc;
                        $totmntnetht=$h->mntNetht;
                        $totmnttva=$h->mntTva;
                        $totmntremis=$h->mntRemise;                        

                    }


                }
               
               


                $art= DB::table('P_Article')->get();
        
              
              if (Session::has('lignes')){
                $mm=Session::get('lignes');
                foreach ($mm as $kk){
                $idldoc=  DB::select("Select dbo.getCodes(?,?) AS result",array('L_LigneDocument',$stat)); 
                foreach($idldoc as $a){

                         $idldoc= $a->result;
                         $ldoc=DB::table('L_LigneDocument')->where('id','=',$a->result)->get();
                     }
                          if (count($ldoc)>=1){
                            
                          }else{  

                foreach($art as $ar){
                    if($ar->id==$kk->idart){
   DB::table('L_LigneDocument')->insert(array('id' =>$idldoc,'version'=>'1','idDocument' => $kk->iddoc, 'idArticle' => $kk->idart, 'codeArticle' => $ar->code, 'libelleArticle' => $ar->libelle, 'qte' =>$kk->qte, 'puht' =>$kk->puht, 'puttc' =>$kk->puttc, 'mntht' => $kk->mntht, 'mntTva' =>$kk->mnttva, 'mntNetht' =>$kk->mntnetht, 'assietteTva'=>$kk->mntnetht, 'mntBrutht'=>$kk->mntbrutht,'mntttc'=>$kk->mntttc ,'tauxRemise' =>$kk->tauxremis/100,'mntRemise'=>$kk->mntremis,'tauxTva'=>$kk->tauxtva,'j_ddm'=>$kk->date,'numordre'=>'1','idStation'=>$stat,'qteRestante'=>0.000,'dateLigne'=>$kk->date,'idEtatDocument'=>'11'));
                            $totmntttc=$totmntttc+$kk->mntttc;
                            $totmntht=$totmntht+$kk->mntht;
                            $totmntnetht=$totmntnetht+$kk->mntnetht;
                            $totmnttva=$totmnttva+$kk->mnttva;
                            $totmntremis=$totmntremis+$kk->mntremis;
                            $iddocc=$kk->iddoc;



                        }
                     }
                 }

             $codes=DB::table('P_codes')->where('idtable','=','L_LigneDocument')->where('idStation','=',$stat)->get();

             foreach($codes as $c){
             $num=$c->num+1;
                }
            DB::table('P_codes')->where('idtable','=','L_LigneDocument')->where('idStation','=',$stat)->update(array('num'=>$num));
            
        }
                

            }


                 if ($idclass==135){
             DB::table('M_Document')->where('id','=',$id)->update(array('mntht'=>($totmntht*$tauxdev),'mntRemise'=>($totmntremis*$tauxdev),'mntTva'=>($totmnttva*$tauxdev),'mntTtc'=>(($totmntttc*$tauxdev)+0.500),'mntNetht'=>($totmntnetht*$tauxdev),'mntBrutht'=>($totmntht*$tauxdev),'timbre'=>0.500000));

                 }else{
            DB::table('M_Document')->where('id','=',$id)->update(array('mntht'=>($totmntht*$tauxdev),'mntRemise'=>($totmntremis*$tauxdev),'mntTva'=>($totmnttva*$tauxdev),'mntTtc'=>($totmntttc*$tauxdev),'mntNetht'=>($totmntnetht*$tauxdev),'mntBrutht'=>($totmntht*$tauxdev)));

                    }


        Session::forget('lignes');
        Session::forget('tauxdevise');


        return redirect('listdocument/affiche/'.$id);

    }

    public function annuldevis($id){

    DB::table('M_Document')->where('id','=',$id)->update(array('idEtatDocument'=>'15'));

    return redirect('listdocument/affiche/'.$id);

    }
}
