@extends('home')



@section('admin')

<style>
td{
    font-size: 12.5px;

}



</style>
<div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="page-title">Tableau de bord <small> Société ASM</small></h3>
                        </div>
<!--<form class="form-horizontal"  method="POST" action="chercher">
                             {{ csrf_field() }}

                           <div class="pull-right ">

                                                               
                                                  
                                                    <div class="col-md-12">
                                                          <input type="date" class="form-control" name="date" >
                                                              @if ($errors->has('date'))
                                                                    <span class="help-block" style="color: red">
                                                                        <strong>{{ $errors->first('date') }}</strong>
                                                                    </span>
                                                         @endif
                                                         
                                                    
                                                </div>
                                                            </div>  
                                                                 <div class="pull-right ">
                           
                             <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Par:</label>

                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="type" class="form-control" onchange="this.form.submit()">
                                                                  
                                                                    <option>Choisir..</option>
                                                                    <option> Année </option>
                                                                    <option>Mois</option>
                                                                   



                                                                  
                                                                  
                                                          </SELECT>

                                                    </div>
                                                                      
                                     
                                                        </div>  


                         </div>
               </form>--></div>
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-primary-1">
                                <div class="inner">
                                    
                                    <h2>{{number_format($chifaf,3)}}</h2>
                                    <p>Chiffre d'affaire (DT)</p>
                                    
                                </div>

                                <div class="icon" style="margin-top: 20px;">
                                    DT
                                </div>

                                <div class="details bg-primary-3">
                                    <span>View Details <i class="fa fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-info-1">
                                <div class="inner">
                                      
                                    <h2>{{$npro}}</h2>
                                    <p>Nombre de produits</p>
                                    
                                </div>

                                <div class="icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>

                                <div class="details bg-info-3">
                                    <span>View Details <i class="fa fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-success-1">
                                <div class="inner">
                                    <h2>{{$nclient}}</h2>
                                    <p>Nombre de clients</p>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-handshake-o"></i>
                                </div>

                                <div class="details bg-success-3">
                                    <span>View Details <i class="fa fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="widget-overview bg-danger-1">
                                <div class="inner">
                                    <h2>{{$nldoc}}</h2>
                                    <p>Nombre de commandes</p>
                                </div>

                                <div class="icon">
                                    <i class="fa fa-pie-chart"></i>
                                </div>

                                <div class="details bg-danger-3">
                                    <span>View Details <i class="fa fa-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row margin-top-10">
                         <div class="col-lg-8" >
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Tiers récemment ajoutée</h5>
                                    <table class="table table-stripped table-hover">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Nom Prénom</td>
                                                <td>Adresse</td>
                                                <td>Type</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           @foreach($tiers as $t)
                                             <tr>
                                                <td><a href="#"> {{$t->code}} </a></td>
                                                <td> {{$t->nomPrenom}}   </td>
                                                <td>  {{$t->adresse}}  </td>
                                                <td>  {{$t->libelleTypeTier}}  </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title">Produits récent</h5>

                                    <div class="recent-products">
                                        <ul>
                                            @foreach ($article as $art)
                                            <li>
                                                <div class="product-image">
                                                    <img src="new.png" alt="">
                                                </div>

                                                <div class="product-info">
                                                    <span class="product-title">

                                                        <a href="#" style="font-size: 13px">{{$art->libelleCourte}}</a>
                                                        <span class="pull-right">
                                            <badge class="badge badge-primary">{{number_format($art->prixuht,3)}} DT</badge>
                                                            </span>
                                                    </span>
                                                    <span class="product-description">{{$art->libelle}}</span>
                                                </div>
                                            </li>
                                                @endforeach
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title">Membres récent</h5>


                                    <ul class="recent-members">

                                        @foreach ($users as $us)
                                        <?php
                                             $d = new DateTime($us->j_ddm);
                                            $date1 = $d->format('Y-m-d') ;


                                        ?>
                                        <li>
                                            <img src="assets/img/profile-picture.jpg" alt="">
                                            <span class="user-name">{{$us->login}}</span><br>
                                            <span class="joined-date">{{$date1}} </span>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8" >
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title">Ordres récent</h5>
                                    <table class="table table-stripped table-hover">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Libelle</td>
                                                <td>Status</td>
                                                <td>Prix</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           @foreach($ldoc as $ld)
                                             <tr>
                                                <td><a href="#">{{$ld->codeArticle}}</a></td>
                                                <td style="width: 38%">{{$ld->libelleArticle}}</td>
                                                @foreach ($etat as $e)
                                                @if ($e->id ==$ld->idEtatDocument)
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
                                                  <td> {{number_format($ld->mntttc,3)}} DT  </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection