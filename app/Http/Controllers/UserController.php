<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
class UserController extends Controller
{
   


  public function index()
    {      

    	if ((Session::get('authh'))!=null) {

    		if (Session::get('authh')==1){
    		    
            if (Session::get('type')==13 || Session::get('type')==1 ){
            $users = DB::table('p_utilisateur')->orderBy('id','desc')->limit(8)->get();
            $ldoc = DB::table('L_LigneDocument')->orderBy('id','desc')->limit(4)->get();
              $devise = DB::table('P_Devise')->get();
              $etat =DB::table('E_EtatDocument')->get();
                 $article = DB::table('P_Article')->orderBy('id','desc')->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->limit(4)->get();
                 $nldoc= DB::table('M_Document')->where('idClasseDocument','=','121')->count();
    				  $tiers = DB::table('P_tier')->orderBy('id','desc')->where('Active','=','True')->where('nomPrenom','!=','')->limit(6)->get();
              $nclient = DB::table('P_tier')->where('idTypeTier','=','1')->where('Active','=','True')->where('nomPrenom','!=','')->count();
              $npro=DB::table('P_Article')->where('active','=','True')->where('qteStock','>=',0)->count();

                $lmdoc= DB::table('M_Document')->where('idClasseDocument','=','121')->whereIn('idEtatDocument',array(12,17))->get();
              $chifaf=0;
              foreach ($lmdoc as $lm){
                if ($lm->tauxChange!=0){
              $chifaf= $chifaf +($lm->mntTtc/$lm->tauxChange);
                }else {
                  $chifaf= $chifaf+$lm->mntTtc;
                }
                }
             return view('dashboard',compact('chifaf','users','ldoc','devise','etat','article','nldoc','tiers','nclient','npro'));
           }else{

              
          
         
                
       $users = DB::table('p_utilisateur')->orderBy('id','desc')->limit(8)->get();
            $ldoc = DB::table('L_LigneDocument')->orderBy('id','desc')->limit(4)->get();
              $devise = DB::table('P_Devise')->get();
              $etat =DB::table('E_EtatDocument')->get();
                 $article = DB::table('P_Article')->orderBy('id','desc')->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->limit(4)->get();
                 $nldoc= DB::table('M_Document')->where('idClasseDocument','=','121')->count();
              $tiers = DB::table('P_tier')->orderBy('id','desc')->where('Active','=','True')->where('nomPrenom','!=','')->limit(6)->get();
              $nclient = DB::table('P_tier')->where('idTypeTier','=','1')->where('Active','=','True')->where('nomPrenom','!=','')->count();
              $npro=DB::table('P_Article')->where('active','=','True')->where('qteStock','>=',0)->count();

                $lmdoc= DB::table('M_Document')->where('idClasseDocument','=','121')->whereIn('idEtatDocument',array(12,17))->get();
              $chifaf=0;
              foreach ($lmdoc as $lm){
                if ($lm->tauxChange!=0){
              $chifaf= $chifaf +($lm->mntTtc/$lm->tauxChange);
                }else {
                  $chifaf= $chifaf+$lm->mntTtc;
                }
                }
             return view('dashboard',compact('chifaf','users','ldoc','devise','etat','article','nldoc','tiers','nclient','npro'));
           }
      		}

      		}else{
					 return view('auth/login');
				 }
    }
	  
  public function login(Request $request)
  	{
  		if ((Session::get('authh'))!=null) {

    		if (Session::get('authh')==1){
    			
    				    return redirect('/');
      		}
      	}

  		   $this->validate($request,['username'=> 'required','password'=>'required'],

                        [
                                   'username.required' =>'le nom d"utilisateur est obligatoire',
                                   'password.required' =>'le mot de passe est obligatoire',
                              

                        ]
         );


  		   $login=$request->username;
  		   $pswc=md5($request->password);
  		   $psw=$request->password;

  		    $trouve = DB::table('p_utilisateur')->get();

  		    $test=0;
  		    	foreach ($trouve as $t){
  		    		if ($t->login==$login && $t->psw==$pswc||$t->psw==$psw ){
  		    				if ($t->active==True){
  		    				Session::set('authh', '1');
  		    				Session::set('user_id', $t->id);
                  Session::set('type',$t->idType);
  		    				Session::set('nompre', $t->nomPrenom);
                  Session::set('station',$t->idStation);
                    $reprsent = DB::table('P_tier')->where('Id_Utilsateur','=',$t->id)->get();

                    foreach ($reprsent as $r){
                       Session::set('rps',$r->id);
                    }
                /*  if ($t->idtype==1 || $t->idtype==13 ){

                  }*/
  		    				$test=1;

                    if (Session::get('type')==13 || Session::get('type')==1 ){
            $users = DB::table('p_utilisateur')->orderBy('id','desc')->limit(8)->get();
            $ldoc = DB::table('L_LigneDocument')->orderBy('id','desc')->limit(4)->get();
              $devise = DB::table('P_Devise')->get();
              $etat =DB::table('E_EtatDocument')->get();
                 $article = DB::table('P_Article')->orderBy('id','desc')->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->limit(4)->get();
                 $nldoc= DB::table('M_Document')->where('idClasseDocument','=','121')->count();
              $tiers = DB::table('P_tier')->orderBy('id','desc')->where('Active','=','True')->where('nomPrenom','!=','')->limit(6)->get();
              $nclient = DB::table('P_tier')->where('idTypeTier','=','1')->where('Active','=','True')->where('nomPrenom','!=','')->count();
              $npro=DB::table('P_Article')->where('active','=','True')->where('qteStock','>=',0)->count();

                $lmdoc= DB::table('M_Document')->where('idClasseDocument','=','121')->whereIn('idEtatDocument',array(12,17))->get();
              $chifaf=0;
              foreach ($lmdoc as $lm){
                if ($lm->tauxChange!=0){
              $chifaf= $chifaf +($lm->mntTtc/$lm->tauxChange);
                }else {
                  $chifaf= $chifaf+$lm->mntTtc;
                }
                }
             return view('dashboard',compact('chifaf','users','ldoc','devise','etat','article','nldoc','tiers','nclient','npro'));
           }else{

          $users = DB::table('p_utilisateur')->orderBy('id','desc')->limit(8)->get();
            $ldoc = DB::table('L_LigneDocument')->orderBy('id','desc')->limit(4)->get();
              $devise = DB::table('P_Devise')->get();
              $etat =DB::table('E_EtatDocument')->get();
                 $article = DB::table('P_Article')->orderBy('id','desc')->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->limit(4)->get();
                 $nldoc= DB::table('M_Document')->where('idClasseDocument','=','121')->count();
              $tiers = DB::table('P_tier')->orderBy('id','desc')->where('Active','=','True')->where('nomPrenom','!=','')->limit(6)->get();
              $nclient = DB::table('P_tier')->where('idTypeTier','=','1')->where('Active','=','True')->where('nomPrenom','!=','')->count();
              $npro=DB::table('P_Article')->where('active','=','True')->where('qteStock','>=',0)->count();

                $lmdoc= DB::table('M_Document')->where('idClasseDocument','=','121')->whereIn('idEtatDocument',array(12,17))->get();
              $chifaf=0;
              foreach ($lmdoc as $lm){
                if ($lm->tauxChange!=0){
              $chifaf= $chifaf +($lm->mntTtc/$lm->tauxChange);
                }else {
                  $chifaf= $chifaf+$lm->mntTtc;
                }
                }
             return view('dashboard',compact('chifaf','users','ldoc','devise','etat','article','nldoc','tiers','nclient','npro'));
           }
  		    		

  		    	}else {
                $nonactive=1;
                return view('auth/login',compact('nonactive'));
            }
          }
  		    		
  		    	}
  		    	if ($test==0){
  		    			$trouvepas=1;
  		    			return view('auth/login',compact('trouvepas'));
  		    	}

  	}

  	public function logout(){

  		Session::forget('authh');
  		Session::forget('user_id');
      Session::forget('type');
  		Session::forget('nompre');
      Session::forget('station');
      Session::forget('lignes');
      Session::forget('tauxdevise');
  		 return redirect('/');

  	}

    public function datesearch(Request $request){

           $this->validate($request,['date'=> 'required'],
                      [
                                   'date.required' =>'Entrée la date tout dabord',
                                   




                        ]
         );


           $users = DB::table('p_utilisateur')->orderBy('id','desc')->limit(8)->get();
            $ldoc = DB::table('L_LigneDocument')->orderBy('id','desc')->limit(4)->get();
              $devise = DB::table('P_Devise')->get();
              $etat =DB::table('E_EtatDocument')->get();
                 $article = DB::table('P_Article')->orderBy('id','desc')->where('active','=','True')->where('prixuht','!=',0)->where('code','!=','')->where('qteStock','>=',0)->limit(4)->get();
                 $nldoc= DB::table('M_Document')->where('idClasseDocument','=','121')->count();
              $tiers = DB::table('P_tier')->orderBy('id','desc')->where('Active','=','True')->where('nomPrenom','!=','')->limit(6)->get();
              $nclient = DB::table('P_tier')->where('idTypeTier','=','1')->where('Active','=','True')->where('nomPrenom','!=','')->count();
              $npro=DB::table('P_Article')->where('active','=','True')->where('qteStock','>=',0)->count();

                $lmdoc= DB::table('M_Document')->where('idClasseDocument','=','121')->whereIn('idEtatDocument',array(12,17))->get();
              $chifaf=0;
              foreach ($lmdoc as $lm){
                if ($lm->tauxChange!=0){
              $chifaf= $chifaf +($lm->mntTtc/$lm->tauxChange);
                }else {
                  $chifaf= $chifaf+$lm->mntTtc;
                }
                }
             return view('dashboard',compact('chifaf','users','ldoc','devise','etat','article','nldoc','tiers','nclient','npro'));

       

    }




}
