@extends('home')




@section('admin')
  <style>
 

  #mylovul{

    width:100%;
    height: 140px;
    overflow: auto;
  }



  </style>
<div class="content-wrapper">
                <div class="content">

<div class="row">





                        <div class="col-md-12">

                          
                                         <div class="card">
                                <div class="card-block">

                                    <h4 class="card-title" style="text-align: center;">Création d'un document</h4>
                                 
                                        <legend class="text-bold">Choix du document</legend>
                                        <div class="row">
                                          
                                            <div class="col-md-12">


                                                <fieldset class="content-group margin-top-10">

                                            <form method="POST" action="ajoutdevisclient">
                                                           {{ csrf_field() }}

                                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="control-label col-form-label">Document</label>
                                                    </div>
                                                    <div class="col-md-8">

                                                          <SELECT name="doc" class="form-control" onchange="this.form.submit()">

                                                              @if (!isset($iddoc))
                                                             <option > Choisir un document.....  </option>
                                                             @endif
                                                                   @foreach($document as $d)

                                                                    @if (isset($iddoc))
                                                                        @if ($iddoc==$d->id)

                                                                 <option value="{{$d->id}}" selected> {{$d->libelle}}</option>

                                                                        @else

                                                                     <option value="{{$d->id}}"> {{$d->libelle}}</option>

                                                                        @endif


                                                                    @else


                                                                      <option value="{{$d->id}}"> {{$d->libelle}}</option>

                                                                    @endif
                                                                   



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>


                                                         </form>
                                                       </fieldset>
                                                     </div>
                                                   </div>
                                                </div>
                                              </div>




                            @if (isset($choix))
                              @if ($choix==1)
                            <div class="card">
                                <div class="card-block">

                                    <h4 class="card-title" style="text-align: center;"> @foreach($docname as $name) {{$name->titre}}  @endforeach</h4>
                                 
                                        <legend class="text-bold">Géneral</legend>
                                        <div class="row">
                                          
                                            <div class="col-md-4">


                                               

                                            <form method="POST" action="ajoutdocclient/{{$iddoc}}">
                                                           {{ csrf_field() }}
                                                     
                                                  <div class="form-group"> 

                                                          <?php  $d = new DateTime(); $date1 = $d->format('Y-m-d') ; $date2 =$d->format('Y') ; ?>
                                                        
                                                         <label class="control-label">Date</label>
                                                    <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                                  
                                                    <input type="date" class="form-control" name="datedevis" style="text-align: center;" value="{{$date1}}"  >                                              
                                                  </div> 
                                              
                                                <fieldset class="content-group margin-top-10">
                                                    
                                                     <div class="form-group"> 

                                                          <label class="control-label">N°P</label>     
                                                          

                                                        @foreach ($prefix as  $pre)  
                                                         
                                                           
                                          
                                        <input type="text" value="{{$pre->num_seq}}" name="codepre" class="form-control" readonly >  </input>

                                                            
                                                    
                                               

                                                        @endforeach
                                                  

                                                    </div>
                                                      
                                             

                                                        <div class="form-group" >
                                                        <label class="control-label">Client n°=</label> 
                                                          <div class="container">
                                                              <div class="dropdown" > <input data-toggle="dropdown"  class="form-control" id="codeclt" name="codeclt" type="text" placeholder="Search.." >      <ul class="dropdown-menu" id="mylovul">
                                             @foreach ($clients  as $clt)  
                                                                 
                                                              <?php


                                                                 $idcli=str_replace(array("'",';',')','(','&','#'),'',$clt->id);
                                                $nomcli=str_replace(array("'",';',')','(','&','#'),'',$clt->nomPrenom);
                                                $adr=str_replace(array("'",";",')','(',"&",'#'),'',$clt->adresse);
                                                 $tel=str_replace(array("'",';',')','(','&','+','#'),'',$clt->tel);

                                                              ?>
<li  style="cursor: pointer;"  onclick="prclient('{{trim($idcli)}}','{{trim($nomcli)}}','{{trim($adr)}}','{{trim($tel)}}')">{{$clt->id}}</li> 
                                               @endforeach
                                                     </ul>
                                                                    
                                                                  </div>
                                                        </div>  
                                                      </div>
                                               <div class="form-group" >
                                                        <label class="control-label"> Nom Prenom Client </label> 
                                                          <div class="container">
                                                              <div class="dropdown" > <input data-toggle="dropdown"  class="form-control" id="libclt" name="libclt" type="text" placeholder="Search.." >      <ul class="dropdown-menu" id="mylovul">
                                             @foreach ($clients  as $clt)  
                                                              
                                                                    <?php


                                                $idcli=str_replace(array("'",';',')','(','&','#'),'',$clt->id);
                                                $nomcli=str_replace(array("'",';',')','(','&','#'),'',$clt->nomPrenom);
                                                $adr=str_replace(array("'",";",')','(',"&",'#'),'',$clt->adresse);
                                                 $tel=str_replace(array("'",';',')','(','&','+','#'),'',$clt->tel);

                                                              ?>  
<li  style="cursor: pointer;"   onclick="prclient('{{trim($idcli)}}','{{trim($nomcli)}}','{{trim($adr)}}','{{trim($tel)}}')">{{$clt->nomPrenom}}</li> 
                                               @endforeach
                                                     </ul>
                                                                    
                                                                  </div>
                                                        </div>  
                                                      </div>
                                                                      
                                                         @if(count($errors))

            <ul>
              @foreach($errors->all() as $errors)
              <li style="color: darkred;"> {{ $errors}}</li>
              @endforeach

            </ul>
            @endif
                                                             
                                                         
                                                                   
                                                                    
                                                                
                                                        
                                                                
                                              </fieldset>
                                                 </div>
                                          
                          
                                         <div class="col-md-8">

                                              <br>
                                              
                                                 <div class="form-group" >
                                                        <label class="control-label">Libelle Devise</label> 
                                                          <div class="container">
                                                              <div class="dropdown" > <input data-toggle="dropdown"  class="form-control" id="libdev" name="libdev" type="text" placeholder="Dinar (s) Tunisien" >      <ul class="dropdown-menu" id="mylovul">
                                               @foreach($devise as $d)
                                                                 
                <li  style="cursor: pointer;"  onclick="tauxchange('{{trim($d->tauxChange)}}','{{trim($d->libelle)}}','{{trim($d->id)}}')">{{$d->libelle}}</li> 
                
                                               @endforeach
                                                     </ul>
                                                                    
                                                                  </div>
                                                        </div>  
                                                      </div>
                                            
                                                <fieldset class="content-group margin-top-10">

                                                     
                                                       <div class="form-group">
                                                        <label class="control-label">Taux</label>
                                                        <input type="number" id="tauxdevis" name="tauxdevis" class="form-control" min="1.000000" value="1.000000" step="0.000001" readonly >

                                                    </div>

                                            <input type="hidden" name="hide" id="hide" >
                                            
                                                      <br> <br> 

                                              <div class="form-group">
                                                        
                                                        <input type="text" class="form-control" readonly id="tel" name="tel" placeholder="Téléphone..."> 
                                                    </div>      
                                                    <br> 
                                                  <div class="form-group">
                                                   
                                                        <input type="text" class="form-control" id="ville" placeholder="Adresse Client ..." name="ville" readonly>
                                                    </div>


                                                                       
                                                                   
                                                                   
                                                                    
                                                                
                                                    
                                                        <div class="pull-right margin-top-20">
     

                            <button type="submit" class="btn btn-primary">  Ajouter @foreach($docname as $name) {{$name->titre}}  @endforeach    </button>
                                            </div>
                                                   

                                                 

                                                  
                                                </fieldset>
                                            </div>
                                        </div>   
                                    </form>
                    </div>

                    </div>
            </div>
@endif 

@endif


@endsection