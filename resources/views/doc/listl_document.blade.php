@extends('home')




@section('admin')

<style>
    
td{
    text-align: center;
   
}


</style>
<div class="content-wrapper">
                <div class="content">
                   

                  <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">

                                    <h5 class="text-bold card-title" style="text-align: center;">@foreach ($mdoc as $m) {{$m->nomPrenomTier}} 
                                     @endforeach </h5>
                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                                            <form class="form-horizontal"  method="GET" action="Imprimerdc">
                                                        {{ csrf_field() }}
                                        <thead>
                                            <tr>
                                                <th>Code  </th>
                                                <th>Libelle Article</th>
                                                <th>Quantité</th>
                                                <th>Prix Unitaire HT</th>
                                                <th>Montant HT </th>
                                                <th>Montant de remise</th>
                                                <th>Montant TVA </th>
                                                <th>Monatnt TTC </th>
                                                <th>Etat_Document </th>

                                            </tr>
                                        </thead>

                                         <tfoot>
                                            <tr>
                                             <th> Code  </th>
                                          
                                                <th>Libelle Article</th>
                                                <th>Quantité</th>
                                                <th>Prix Unitaire HT</th>
                                               <th> Montant HT </th>
                                                <th>Montant de remise</th>
                                                 <th>Montant TVA </th>
                                                
                                                 <th>Monatnt TTC </th>
                                                 <th> Etat_Document </th>

                                            </tr>
                                        </tfoot>





                                        <tbody>

                                            @foreach($idldoc as $d)
                                         
                                        <tr>
                                              
                                                <td style="text-align: left"> {{$d->codeArticle}} </td>
                                                <td style="width: 5%;text-align: left">  {{$d->libelleArticle}}   </td>
                                                <td >  x {{$d->qte*1}}   </td>
                                                <td style="text-align: right;">   {{number_format($d->puht,3)}} DT   </td>
                                                 <td style="text-align: right;"> {{number_format($d->mntht,3)}}  DT  </td>
                                                 <td style="text-align: right;"> {{number_format($d->mntRemise,3)}}  DT  </td>
                                                <td style="text-align: right;"> {{number_format($d->mntTva,3)}}  DT  </td>
                                                 
                                               <td> {{number_format($d->mntttc,3)}}  DT  </td>
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
                                           
                                            </tr>

                                         

                                        

                                        @endforeach
                                        </tbody>
                                    </table>


                            <div class="pull-right margin-top-20 margin-left-20">
                                                               
                                                        @foreach($mdoc as $m) 
                                                            @if ($m->etatTrans=='Non Transformé'||$m->etatTrans==Null)      
                                                                @foreach ($circuit as $c)
                                                  <a  href="transformation/{{$c->id}}/{{$m->id}}" class="btn btn-outline-info">
                                                                   Transformer: {{$c->libelle}}
                                                                        <i class="fa fa-retweet position-right"></i>
                                                                    
                                                                </a>
                                                                @endforeach
                                                            @else
                                                            
                                                                <span class="badge badge-flat badge-info">{{$m->etatTrans}}</span>
                                                             @endif 
                                                          @endforeach    

                                                                   @foreach ($mdoc as $m)
                                                                <a  href="pdf/{{$m->id}}" class="btn btn-secondary">
                                                                    Imprimer
                                                                        <i class="fa fa-print position-right"></i>
                                                                    
                                                                </a>
                                                                @endforeach

                                                                  @foreach ($mdoc as $m)
                                                  <a  href="{{url('ajoutldevis',$m->id)}}" class="btn btn-primary">
                                                                    Ajouter des lignes
                                                                        <i class="fa fa-arrow-right position-right"></i>
                                                                    
                                                                </a>
                                                                @endforeach

                                                            </div>
                                                            
                                  <div class="pull-left margin-top-20">
                                      @foreach ($mdoc as $m)
      <button type="button" class="btn btn-secondary" onclick="document.location.href='../../listdocument/{{$m->idClasseDocument}}';"> 
                                                                <i class="fa fa-reply position-left"></i>
                                                                    Retour à la page précédente
                                                                    
                                                                </button>
                                                                @endforeach
                                            </div>
                                </div>

                            </form>

                            </div>

                        </div>

                    </div>

                   
        </div>
     </div>



@endsection