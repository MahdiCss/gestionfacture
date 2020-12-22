@extends('home')




@section('admin')



<?php
foreach ($name as $n){

  $idtype=$n->id;
}



?>
<div class="content-wrapper">
                <div class="content">
@if ($b==1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block text-center">
                                    <h6 class="text-bold">Recherche par famille </h6>
                                    <div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                      @if (isset($namefam))
                                                        @foreach($namefam as $nf)

                                                          {{$nf->libelle}}

                                                        @endforeach
                                                      @else

                                                        Choisir par famille

                                                      @endif
                                                        
                                                        <div class="pull-right">
                                                         <i class="fa fa-angle-down position-right"></i>
                                                       </div>
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-block">
                                        <form class="form-horizontal"  method="POST" action="{{url('cherchfam',$idtype)}}">
                                        {{ csrf_field() }}
                                <div class="row">
                                            

                                          @foreach($famille as $fam)  
                                          <div class="col-md-6"> 
                                       &nbsp&nbsp&nbsp&nbsp&nbsp <span> {{$fam->libelle}} </span>
                                         <div style="margin-top:-15px;">
                                  <input type="radio" onclick="this.form.submit()" class="form-control" name="libfam" value="{{$fam->id}}">
                                </div>
                                                   </div>  
                                          @endforeach    

                                              
                                            </div>
                                          </form>  
                                                </div>
                                            </div>


                                        </div>

                            @if (isset($namefam))   
                                         <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                                       @if (isset($namemrq))
                                                        @foreach($namemrq as $nm)

                                                          {{$nm->libelle}}

                                                    </a>
                                                </h5>
                                            </div>

                                                        @endforeach
                                                      @else
                                                   Choisir la marque de cette famille

                                                        <div class="pull-right">
                                                         <i class="fa fa-angle-down position-right"></i>
                                                       </div>
                                                    </a>
                                                </h5>
                                            </div>

                                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="card-block">
                                        <form class="form-horizontal"  method="POST" action="{{url('cherchmrq',$idtype)}}">
                                        {{ csrf_field() }}
                                <div class="row">
                                            

                                          @foreach($art as $ar) 
                                            @if($ar->libellleMarque!="") 
                                          <div class="col-md-6"> 
                                       &nbsp&nbsp&nbsp&nbsp&nbsp <span> {{$ar->libellleMarque}} </span>
                                         <div style="margin-top:-15px;">
                                  <input type="radio" onclick="this.form.submit()" class="form-control" name="libmrq" value="{{$ar->idMarque}}">
                                  <input type="hidden" name="libfam" value="{{$ar->idFamille}}">
                                </div>
                                                   </div>  
                                                   @endif
                                          @endforeach    

                                              
                                            </div>
                                          </form>  
                                                </div>
                                            </div>

                                           @endif
                                        </div>
                                         
                                        @endif
                                       
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>



                      @endif


                  

                  <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">

                                    <h5 class="text-bold card-title" style="text-align: center;"> @foreach ($name as $n) {{$n->libelle}} <?php $idtype=$n->id;   ?> @endforeach</h5>
                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                
                                                <th>Code Article</th>
                                                <th>libelle</th>
                                                 <th> Prix Unitaire HT</th>
                                                <th>Quantité en Stock</th>
                                                 <th> Désactiver </th>
                                                <th> Modifier </th>
                                               
                                               
                                                
                                            </tr>
                                        </thead>

                                         <tfoot>
                                            <tr>
                                          
                                                <th>Code Article</th>
                                                <th>Libelle</th>
                                                <th>Prix Unitaire HT</th>
                                                <th>Quantité en Stock</th>
                                                <th>Désactiver </th>
                                                <th>Modifier </th>
                                              
                                               
                                             
                                            </tr>
                                        </tfoot>





                                        <tbody>

                                            @foreach($art as $d)
                                         
                            <tr  style="cursor: pointer;">

                                               
                                                <td >  {{$d->code}}   </td>
                                                <td style="width: 30%">  {{$d->libelle}}   </td>
                                                  <td style="text-align: center;">  {{number_format($d->prixuht,3)}}DT </td>
                                                <td style="text-align: center;">  {{$d->qteStock*1}}   </td>
                                                @if ($b==1)
                <td><a href="destroy/{{$d->id}}" class="btn btn-danger pull-left">
                  Désactiver <i class="fa fa-remove"></i></a></td>
                                                @else
                    <td><a href="reactive/{{$d->id}}" class="btn btn-success pull-left">
                  Activer <i class="fa fa-check"></i></a></td>

                                                @endif
                 <td>    <a href="{{URL::route('listarticle.edit',$d->id)}}" class="btn btn-primary pull-left ">Editer <i class=" fa fa-edit "></i></a> </td>
                                              
                                               
                                              
                                           
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                     <div class="pull-left margin-top-20">
      <button type="button" class="btn btn-secondary" onclick="document.location.href='{{URL::route('listarticle.index')}}';"> 
                                                                <i class="fa fa-reply position-left"></i>
                                                                    Retour à la page précédente
                                                                    
                                                                </button>
                                            </div>
                                        @if ($b==1)
                                            <form class="form-horizontal"  method="get" action="{{url('nonactive',$idtype)}}">
                                        {{ csrf_field() }}
                                                     <div class="pull-right margin-top-15">
                                                        <button type="submit" class="btn btn-danger"> 
                                                        Voir les produits non active                                <i class="fa fa-arrow-right position-right"></i>                                    
                                                        </button>
                                            </div>
                                          </form>
                                          @else

                                        
                                                     <div class="pull-right margin-top-15">
                                                        <button type="button" onclick="location.href='{{URL::route('listarticle.show',$idtype)}}'" class="btn btn-success"> 
                                                        Voir les produits active                                <i class="fa fa-arrow-right position-right"></i>                                    
                                                        </button>
                                            </div>
                                          




                                          @endif
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
     </div>





@endsection