@extends('home')




@section('admin')


<div class="content-wrapper">

                <div class="content">
                   

                  <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-block">


                             <h5 class="text-bold card-title" style="text-align: center;"> @foreach($iddoc as $doc) {{$doc->titre}} </h5>
                                    @endforeach 
    
                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">

                                          
                                        <thead>
                                            <tr>
                                              
                                                <th>Code Document</th>    
                                                <th>dateCreation</th>
                                                <th> Nom du Tier</th>
                                               
                                                <th> Montant HT</th>
                                             
                                                <th> Montant Net HT </th>
                                              
                                                <th> Montant TTC </th>
                                                 <th> Etat_Document </th>
                                                 <th> Modifier_Etat </th>

                                            </tr>
                                        </thead>

                                         <tfoot>
                                            <tr>
                                            
                                                <th>Code Document</th>    
                                                <th>dateCreation</th>
                                                <th> Nom du Tier</th>
                                              
                                                <th> Montant HT</th>
                                             
                                                <th> Montant Net HT </th>
                                              
                                                <th> Montant TTC </th>
                                                <th> Etat_Document </th>
                                                 <th> Modifier_Etat </th>

                                            </tr>
                                        </tfoot>





                                        <tbody>

                                                 @foreach($mdoc as $d)
                                                           @if ($d->idDevise==null)
                                                            <tr onclick="location.href='{{URL::route('list1document.show',$d->id)}}' " style="cursor: pointer;">
                                                     <td >  {{$d->code}}   </td>     
                                                      
                                                <td>  {{$d->datecreation}}   </td>
                                                <td> {{$d->nomPrenomTier}}  </td>
                                               
                                                <td> {{number_format($d->mntht,3)}} DT </td>
                                                <td> {{number_format($d->mntNetht,3)}} DT </td>
                                                <td> {{number_format($d->mntTtc,3)}} DT </td>
                                                      @foreach ($etat as $e)
                                                @if ($e->id ==$d->idEtatDocument)
                                                    @if ($e->code=='Valide')
                                                <td>
                                                    <badge class="badge badge-success">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                     @if ($e->code=='EnAttente')
                                                <td>
                                                    <badge class="badge badge-warning">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                         @if ($e->code=='Annulee')
                                                <td>
                                                    <badge class="badge badge-danger">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                            @if ($e->code=='Arrivée')
                                                <td>
                                                    <badge class="badge badge-primary">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                                  @if ($e->code=='Facturee')
                                                <td>
                                                    <badge class="badge badge-info">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                    


                                                @endif    
                                                @endforeach 

          <td>    <a href="{{URL::route('list1document.edit',$d->id)}}" class="btn btn-primary pull-left ">Editer_Etat  <i class=" fa fa-edit "></i></a> </td> 
                                            </tr>
                                                        @endif
                                                    @endforeach
                                                
                                            @foreach($mdoc as $d)

                                            @foreach($devise as $dev)
                                                @if ($dev->id==$d->idDevise)
                            <tr onclick="location.href='{{URL::route('list1document.show',$d->id)}}' " style="cursor: pointer;">

                                            
                                                <td >  {{$d->code}}   </td>      
                                                <td>  {{$d->datecreation}}   </td>
                                                <td> {{$d->nomPrenomTier}}  </td>
                                               
                                          <td> {{number_format($d->mntht,$dev->chifreAfterV)}} {{$dev->symbole}} </td>
                                         <td> {{number_format($d->mntNetht,$dev->chifreAfterV)}} {{$dev->symbole}} </td>
                                        <td> {{number_format($d->mntTtc,$dev->chifreAfterV)}}  {{$dev->symbole}}</td>
                                          @foreach ($etat as $e)
                                                @if ($e->id ==$d->idEtatDocument)
                                                    @if ($e->code=='Valide')
                                                <td>
                                                    <badge class="badge badge-success">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                     @if ($e->code=='EnAttente')
                                                <td>
                                                    <badge class="badge badge-warning">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                         @if ($e->code=='Annulee')
                                                <td>
                                                    <badge class="badge badge-danger">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                            @if ($e->code=='Arrivée')
                                                <td>
                                                    <badge class="badge badge-primary">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                                  @if ($e->code=='Facturee')
                                                <td>
                                                    <badge class="badge badge-info">{{$e->libelle}}</badge>
                                                </td>
                                                    @endif
                                                    


                                                @endif    
                                                @endforeach 
                                                        <td>    <a href="{{URL::route('list1document.edit',$d->id)}}" class="btn btn-primary pull-left ">Editer_Etat  <i class=" fa fa-edit "></i></a> </td> 
                                            </tr>
                                           @endif 
                                            @endforeach
                                        @endforeach


                                               
                                        </tbody>
                                      

                                    </table>


                 

                                            <div class="pull-left margin-top-20">
      <button type="button" class="btn btn-secondary" onclick="document.location.href='../listdocument';"> 
                                                                <i class="fa fa-reply position-left"></i>
                                                                    Retour à la page précédente
                                                                    
                                                                </button>
                                            </div>
                
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
     </div>





@endsection