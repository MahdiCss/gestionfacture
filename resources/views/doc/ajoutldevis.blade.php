@extends('home')




@section('admin')

<style>
 

  #mylovul{

    width:100%;
    height: 250px;
    overflow: auto;
  }


.alert.warning {
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;

    display: none;}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
td{
  font-size: 13px;
}

  </style>

<div class="content-wrapper">
                <div class="content">
                   
    <div class="ligcour" id="ligcour"> 
       <h5 class="text-bold card-title" style="text-align: center;">@foreach ($mdoc as $m) {{$m->nomPrenomTier}}  @endforeach </h5>
                                        <legend class="text-bold">Géneral</legend>
                                        <div class="row">

                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-block">

                                   

                                    @foreach ($mdoc as $m)  
                          <form  method="POST" action="ajouternouvdev/{{$m->id}}"> 
                                      {{ csrf_field() }} 
                                      @endforeach


                                        <div class="row">
                                          <div class="col-md-6">

                                              <div class="form-group">
                                                        <label class="control-label">Code Article</label>
                                     <div class="container">
                                                          
                                                                  <div class="dropdown" > <input data-toggle="dropdown"  class="form-control" id="codeart" type="text" placeholder="Search.." name="codeart" >      <ul class="dropdown-menu" id="mylovul">

                                                                      @foreach ($articles as $art)
    <li  style="cursor: pointer;"  onclick="prarticle('{{trim($art->id)}}','{{trim($art->libelleCourte)}}','{{trim($art->prixuht)}}','{{trim($art->tauxTva)}}','{{trim($art->qteStock)}}','{{trim($art->RemiseMax)}}')">{{$art->id}}</li>
                                                                     @endforeach
                                                                    </ul>
                                                                    
                                                                  </div>
                                                                    @if ($errors->has('codeart'))
                                                                    <span class="help-block" style="color: red">
                                                                        <strong>{{ $errors->first('codeart') }}</strong>
                                                                    </span>
                                                         @endif


                                                        </div>  
                                                      </div>
                                                    </div>

                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label class="control-label">Libelle Article</label>
                                     <div class="container" >
                                                          
                                                                  <div class="dropdown" >
                                                                   
                                                                    
                                  <input data-toggle="dropdown"  class="form-control" id="libart" name="libart" type="text" placeholder="Search.." >   
                                                                        <ul class="dropdown-menu" id="mylovul">

                                                                      @foreach ($articles as $art)
   <li  style="cursor: pointer;"  onclick="prarticle('{{trim($art->id)}}','{{trim($art->libelleCourte)}}','{{trim($art->prixuht)}}','{{trim($art->tauxTva)}}','{{trim($art->qteStock)}}','{{trim($art->RemiseMax)}}')">{{$art->libelle}}</li>
                                                                     @endforeach
                                                                    </ul>
                                                                    
                                                                  </div>
                                                                    @if ($errors->has('libart'))
                                                                    <span class="help-block" style="color: red">
                                                                        <strong>{{ $errors->first('libart') }}</strong>
                                                                    </span>
                                                         @endif
                                                        </div>
                                                        </div>  
                                                      </div>


                                                   
                                                       </div>
                                                     </div>
                       </div>
                      


                     
                                <div class="ligcour" id="ligcour"> 
                                        <legend class="text-bold">Ligne Courante</legend>
                                        <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">

                                                       <div class="row">
                                          
                                            <div class="col-md-6">


                                           


                                                            <div class="form-group">
                                                        <label class="control-label">Quantité</label>
                                                        <input type="number" class="form-control" id="qte" name="qte" min="1.000" step="1.000" onblur="verifqte()"> 
                                                          </div>
                                                          @if (Session::has('erreur1')) 
                                                          <span class="help-block"  style="color: red">
                                                                        <strong id="p1">{{Session::get('erreur1')}}</strong>
                                                          </span>
                                                          @else
                                                          <span class="help-block"  style="color: red">
                                                                        <strong id="p1"></strong>
                                                          </span>
                                                          @endif
                                                            @if ($errors->has('qte'))
                                                                    <span class="help-block"  style="color: red">
                                                                        <strong>{{ $errors->first('qte') }}</strong>
                                                                    </span>
                                                         @endif

                                                            <div class="form-group">
                                                        <label class="control-label">Prix Unitaire HT</label>
                                                       <input type="number" class="form-control" id="prixuht" name="prixuht" min="0.000" step="1.000" value="0.000" > 
                                                            </div>
                                                              @if ($errors->has('prixuht'))
                                                                    <span class="help-block" style="color: red">
                                                                        <strong>{{ $errors->first('prixuht') }}</strong>
                                                                    </span>
                                                         @endif

                                                              <div class="form-group">
                                                        <label class="control-label">Remise</label>
                                                         <input type="number" class="form-control"  id="remise" name="remise" step="1.00" min="0.00" max="100" value="0.00" onblur="verifqte()"> 
                                                            </div>
                                                              @if (Session::has('erreur2')) 
                                                          <span class="help-block"  style="color: red">
                                                                        <strong id="p2">{{Session::get('erreur2')}}</strong>
                                                          </span>
                                                          @else
                                                          <span class="help-block"  style="color: red">
                                                                        <strong id="p2"></strong>
                                                          </span>
                                                          @endif
                                                              @if ($errors->has('remise'))
                                                                    <span class="help-block" style="color: red">
                                                                        <strong>{{ $errors->first('remise') }}</strong>
                                                                    </span>
                                                         @endif

                                                              <div class="form-group">
                                                        <label class="control-label">Tva</label>
                                                       <input type="number" class="form-control"  id="tva" name="tva" step="1.000" min="0.000" value="0"   readonly>
                                                              </div>
                                                                @if ($errors->has('tva'))
                                                                    <span class="help-block" style="color: red">
                                                                        <strong>{{ $errors->first('tva') }}</strong>
                                                                    </span>
                                                         @endif
                                                            
                                                              </div>

                                                                <div class="col-md-6">
                                                                  <div class="form-group">
                                                        <label class="control-label">Total HT</label>
                                                        <input type="number" class="form-control"  id="totnetht" name="totnetht" step="1.000" min="0.000" value="0.000" style="color: red;" readonly> 
                                                      </div>

                                                          <div class="form-group">
                                                        <label class="control-label">Total Net HT</label>
                                                         <input type="number" class="form-control"  id="totnet" name="totnet" step="1.000" min="0.000" value="0.000" style="color: red;" readonly>
                                                       </div>
                                                          <div class="form-group">
                                                        <label class="control-label">Total TVA</label>
                                                         <input type="number" class="form-control"  id="tottva" name="tottva" step="1.000" min="0.000" value="0.000" style="color: red;" readonly>
                                                       </div>
                                                          <div class="form-group">
                                                        <label class="control-label">Total TTC</label>
                                                         <input type="number" class="form-control"  id="totttc" name="totttc" step="1.000" min="0.000" value="0.000" style="color: red;" readonly>
                                                       </div>

                                                                </div>
                                                              </div>

                                                              <div class="pull-right">
                                                      <button type="reset" class="btn btn-secondary">
                                                          Reset
                                                          <i class="fa fa-refresh position-right"></i>
                                                      </button>
                                                           <button class="btn btn-primary" type="submit"  >
                                                      Ajouter
                                                <i class="fa fa-arrow-right position-right"></i>
                                            </button>
                                                        
                                                    
                                                  </div>


                                          </div>

                                               </div>
                                             </div></div></div>
                                     </form>           

                       <br> <br>

       
                                                             
        </div>

     </div>

  <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">

                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                               <th>#</th>
                                                <th>Libelle Article</th>
                                                <th>Quantité</th>
                                                <th>Prix Unitaire HT</th>
                                               
                                                 <th>Montant TVA </th>
                                                 <th>Monatnt TTC </th>
                                            
                                                 <th>Taux de remise</th>
                                                 <th>Montant de remise</th>

                                            </tr>
                                        </thead>

                                         <tfoot>
                                            <tr>
                                               
                                                <th>#</th>
                                                <th>Libelle Article</th>
                                                <th>Quantité</th>
                                                <th>Prix Unitaire HT</th>
                                               
                                                 <th>Montant TVA </th>
                                                 <th>Montant TTC </th>
                                             
                                                 <th>Taux de remise</th>
                                                 <th>Montant de remise</th>


                                            </tr>
                                        </tfoot>





                                        <tbody>

                                       <?php       $somttc=0;$somht=0; ?>
                                             @if (Session::has('lignes')) 

                                             <?php $mm=Session::get('lignes');  ?> 
                                          @foreach ($mm as $kk)
                                        <tr>
                                            
                                                <td> {{$kk->iddoc}} </td>
                                                @foreach ($articles as $art)
                                                @if ($kk->idart==$art->id)
                                                <td style="width: 20%">  {{$art->libelleCourte}}   </td>
                                                @endif
                                                @endforeach
                                                <td>  x{{$kk->qte*1}}   </td>
                                                <td>  {{number_format($kk->puht,3)}} DT   </td>
                                                
                                                <td> {{number_format($kk->mnttva,3)}} DT  </td>
                                                 <td> {{number_format($kk->mntttc,3)}} DT </td>
                                               
                                                 <td> {{$kk->tauxremis}} % </td>
                                                 <td> {{number_format($kk->mntremis,3)}} DT  </td>
                                              
                                           
                                            </tr>
                                            <?php  $somttc=$somttc+$kk->mntttc;
                                                    $somht=$somht+$kk->mntht;

                                                       ?>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>

                         
                                                            
                                                            <div class="pull-left margin-top-20">
         
                                                        @foreach ($mdoc as $m)  
                                          <a class="btn btn-danger" href="annulerdevis/{{$m->id}}"  >
                                                   Annuler
                                                <i class="fa fa-remove position-right"></i>
                                                        </a>
                                                        @endforeach
                                          </div>


                                                      <div class="pull-right">
                                                        @foreach ($mdoc as $m)  
                                          <a class="btn btn-primary" href="creation/{{$m->id}}"  >
                                                   Enregistrer
                                                <i class="fa fa-arrow-right position-right"></i>
                                                        </a>
                                                        @endforeach
                                          </div>
                                </div>
      <legend class="text-bold" style="text-align: center;">Total</legend>
                                        <div class="row">
                                          
                                        
                                             <div class="col-md-6">
                                             
                                                     <div class="form-group"> 
                                                        <label class="control-label" style="font-weight: bold;color:red;">Total Montant HT</label>
                                                     <input type="text" style="text-align: center;" class="form-control" id="totalht" value="{{number_format($somht,3)}} DT" readonly>          
                                                    </div>
           
                              
                                            </div>
                                       
                                        
                                            <div class="col-md-6">
                                                
                                                    <div class="form-group"> 
                             <label class="control-label" style="    font-weight: bold;color:red;" >Total Montant TTC</label>
                       <input style="text-align: center;" type="text" class="form-control" id="totalttc" value="{{number_format($somttc,3)}} DT" readonly>
                                                        

                                             </div>         
                                     
                                          
                                        </div>  
                                  </div>
                       

                            </div>







             </div>     

     







<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>                                     

@endsection