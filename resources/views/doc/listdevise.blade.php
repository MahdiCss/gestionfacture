@extends('home')




@section('admin')



 <div class="content-wrapper">
                <div class="content">
                    
 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title" style="text-align: center;">Listes des devises</h5>
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Libelle</th>
                                                <th>Symbole</th>
                                                <th>Chiffre apres la virgule </th>
                                                <th>Taux Change</th>
                                                <th>Editer</th>
                                                <th>Activation</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($devis as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td> {{$d->code}} </td>
                                                 <td>{{$d->libelle}} </td>
                                                 <td> {{$d->symbole}}   </td>
                                                <td>{{$d->chifreAfterV}} </td>
                                                 <td>{{$d->tauxChange}} </td>

                                                 <td>    <a href="listdeviseedit/{{$d->id}}" class="btn btn-primary pull-left ">Editer <i class=" fa fa-edit "></i></a> </td>
                                            @if($d->active==True)
                                                 <td><a href="listdevisedestroy/{{$d->id}}" class="btn btn-danger pull-left">
                                                     Désactiver <i class="fa fa-remove"></i></a></td>
                                            @else
                                                 <td><a href="reactivedevise/{{$d->id}}" class="btn btn-success pull-left">
                  Activer&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <i class="fa fa-check"></i></a></td>


                                            @endif

                                            </tr>
                                           @endforeach
                                                                                   </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
           


            
            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Ajout nouvel devise</h5>
                                    <legend class="text-bold margin-top-30">Information de la devise</legend>
                            <form class="form-horizontal"  method="POST" action="ajoutnouvdevise">
                                        {{ csrf_field() }}
                                <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }} row margin-top-10">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">ID devise</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input id="id" type="text" class="form-control" name="id" value="{{ old('id') }}">
                                                         @if ($errors->has('id'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('id') }}</strong>
                                                                    </span>
                                                         @endif
                                                    </div>
                                                </div>


                                                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Code</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}">

                                                                @if ($errors->has('code'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('code') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>



                                                            <div class="form-group{{ $errors->has('lib') ? ' has-error' : '' }} row margin-top-10">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Libelle</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    
                                                                           <input id="lib" type="text" class="form-control" name="lib" value="{{ old('lib') }}">
                                                                              @if ($errors->has('lib'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('lib') }}</strong>
                                                                    </span>
                                                                @endif
                                                                           
                                                                   
                                                                </div>
                                                            </div>

                                                                 <div class="form-group{{ $errors->has('smb') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">symbole</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                  

                                                                    <input id="smb" type="text" class="form-control" name="smb" value="{{ old('smb') }}">
                                                                             @if ($errors->has('smb'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('smb') }}</strong>
                                                                    </span>
                                                                @endif
                                                                

                                                                </div>
                                                            </div>

                                                         

                                            

                                            </div>

                                            <div class="col-md-6">
                                                      <div class="form-group{{ $errors->has('cav') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Chiffre aprés la virgule</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                      
                                                                    <input id="cav" type="text" class="form-control" name="cav" value="{{ old('cav') }}">
                                                                        
                                                                @if ($errors->has('cav'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('cav') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>
                                             
                                                <div class="form-group{{ $errors->has('tc') ? ' has-error' : '' }} row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Taux de Change</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        
                                                             <input id="tc" type="text" class="form-control" name="tc" value="{{ old('tc') }}">

                                                         
                                                       
                                                           @if ($errors->has('tc'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('tc') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>


                                
                                                
                                            
                                                         

                                                  
                                        

                                     

                                                            <div class="pull-right margin-top-20">
                                                                <button type="reset" class="btn btn-secondary">
                                                                    Reset
                                                                    <i class="fa fa-refresh position-right"></i>
                                                                </button>

                                                                <button type="submit" class="btn btn-primary">
                                                                    Enregistrer

                                                                    <i class="fa fa-arrow-right position-right"></i>
                                                                </button>
                                                            </div>

                                                            </div>
                                </div>
                            </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection