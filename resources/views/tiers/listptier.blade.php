@extends('home')





@section('admin')


<div class="content-wrapper">
                <div class="content">
                   

                  <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">

                                    <h5 class="text-bold card-title" style="text-align: center;"> @foreach ($tiername as $n) {{$n->libelle}} @endforeach</h5>
                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                             
                                              
                                                <th>Nom et Prénom</th>
                                                 <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>E_Mail</th>
                                                <th>Fax</th>
                                                 <th> Activation </th>
                                                <th> Modifier </th>
                                               
                                               
                                                
                                            </tr>
                                        </thead>

                                         <tfoot>
                                            <tr>
                                           
                                        
                                                <th>Nom et Prénom</th>
                                                 <th>Adresse</th>
                                                <th>Téléphone</th>
                                                <th>E_Mail</th>
                                                <th>Fax</th>
                                                 <th> Activation </th>
                                                <th> Modifier </th>
                                               
                                               
                                             
                                            </tr>
                                        </tfoot>





                                        <tbody>

                                            @foreach($tiertyp as $d)
                                                    @if ($d->nomPrenom!="")
                            <tr  style="cursor: pointer;">

                                               
                                               
                                                <td>  {{$d->nomPrenom}}   </td>
                                                  <td>  {{$d->adresse}} </td>
                                                <td>  {{$d->tel}}   </td>
                                                      <td>  {{$d->mail}}   </td>
                                                            <td>  {{$d->fax}}   </td>
                    @if($d->Active==True)
                                                 <td><a href="destroy/{{$d->id}}" class="btn btn-danger pull-left">
                                                     Désactiver <i class="fa fa-remove"></i></a></td>
                                            @else
                                                 <td><a href="reactivetier/{{$d->id}}" class="btn btn-success pull-left">
                  Activer&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <i class="fa fa-check"></i></a></td>


                                            @endif
                 <td>    <a href="{{URL::route('listtiers.edit',$d->id)}}" class="btn btn-primary pull-left ">Editer  <i class=" fa fa-edit "></i></a> </td>
                                              
                                               
                                              
                                           
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                                                                                <div class="pull-left margin-top-20">
      <button type="button" class="btn btn-secondary" onclick="javascript:history.back();"> 
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