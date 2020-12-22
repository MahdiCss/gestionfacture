
@extends('home')




@section('admin')

<div class="content-wrapper">

                <div class="content">
                   

                  <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-block">


                             <h5 class="text-bold card-title" style="text-align: center;"> @foreach($mdoc as $doc) {{$doc->titre}} </h5>

                              @endforeach 
    
                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">

                                            
                                        <thead>
                                            <tr>
                                              
                                                <th>Code Document</th>    
                                                <th>dateCreation</th>
                                                <th> Nom du Tier</th>
                                                 <th> Etat_Document </th>
                                                 

                                            </tr>
                                        </thead>

                                         <tfoot>
                                            <tr>
                                            
                                                <th>Code Document</th>    
                                                <th>dateCreation</th>
                                                <th> Nom du Tier</th>
                                                
                                                <th> Etat_Document </th>
                                               

                                            </tr>
                                        </tfoot>





                                        <tbody>

                                                 @foreach($mdoc as $d)
                                                     <tr>     
                                                     <td >  {{$d->code}}   </td>     
                                                      
                                                <td>  {{$d->datecreation}}   </td>
                                                <td> {{$d->nomPrenomTier}}  </td>
                                               
                                              


                                                    <td>       
                                     <form class="form-horizontal"  method="POST" action="modifetat">
                                              {{ csrf_field() }}
                                                         <div class="form-group row">
                                                   
                                                    

                                                          <SELECT name="etat" class="form-control" onchange="this.form.submit()">
                                                                   @foreach ($etat as $e)
                                                                     @if ($e->id ==$d->idEtatDocument)
                                                            <option value="{{$e->id}}" selected> {{$e->libelle}}</option>
                                                                        @else 

                                                                  <option value="{{$e->id}}"> {{$e->libelle}}</option>
                                                                    @endif
                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                   
                                                </div>   
                                            </form>
                                                 </td>

                                               
                                               
                                                   



         
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="pull-left margin-top-20">
                                      @foreach ($mdoc as $m)
      <button type="button" class="btn btn-secondary" onclick="document.location.href='../../listdocument/{{$m->idClasseDocument}}';"> 
                                                                <i class="fa fa-reply position-left"></i>
                                                                    Annuler
                                                                    
                                                                </button>
                                                                @endforeach
                                            </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

                                                       
                                                    @endforeach
                       @endsection