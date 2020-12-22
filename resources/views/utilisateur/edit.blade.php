@extends('home')




@section('admin')


<div class="content-wrapper">
    <div class="content">
            
            





            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Modifier Utilisateur</h5>
                                    <legend class="text-bold margin-top-30">Personal Information</legend>
                                    @foreach ($users as $us)
                          <form class="form-horizontal"  method="POST" action="{{route('listclient.update',$us->id)}}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                               <div class="col-md-6">
                                                                    <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Nom et Prénom</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="name" type="text" class="form-control" name="name" value="{{ $us->nomPrenom}}">
                                                                                         @if ($errors->has('name'))
                                                                                                    <span class="help-block">
                                                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                                                    </span>
                                                                                         @endif
                                                                                    </div>
                                                                                </div>


                                                                        <div class="form-group row">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label col-form-label">Login</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input id="username" type="text" class="form-control" name="username" value="{{ $us->login }}">

                                                                            @if ($errors->has('username'))
                                                                                <span class="help-block">
                                                                                    <strong>{{ $errors->first('username') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                            </div>
                                                                        </div>



                                                                    <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">Adresse E_mail</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa fa-user"></i>
                                                                                </span>
                                                                                   <input id="email" type="email" class="form-control" name="email" value="{{ $us->mail }}">

                                                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                      

                                        </div>
                                                            <div class="col-md-6">
                                                                    <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Téléphone</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="tel" type="text" class="form-control" name="tel" value="{{ $us->tel}}">
                                                                                         @if ($errors->has('tel'))
                                                                                                    <span class="help-block">
                                                                                                        <strong>{{ $errors->first('tel') }}</strong>
                                                                                                    </span>
                                                                                         @endif
                                                                                    </div>
                                                                                </div>


                                                                        <div class="form-group row">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label col-form-label">Role</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                            <select class="form-control" name="role">
                                                                            @foreach($type as $t)


                                                                                @if ($t->id==$us->idType)
                                                                                <option selected value="{{$t->id}}"> {{$t->libelle }}</option>
                                                                                @else

                                                                                    <option value="{{$t->id}}"> {{$t->libelle }}</option>
                                                                                @endif


                                                                               
                                                                            @endforeach
                                                                             </select>
                                                                         </div>
                                                                        </div>

                                                                         <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label class="control-label col-form-label">Compte</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                            @if($us->active==True)
                                                    <input type="radio" value="True" name="act" checked>Activer <br>
                                                    <input type="radio" value="False"  name="act" >Désactiver 
                                                    @else
                                                     <input type="radio" value="True" name="act" >Activer <br>
                                                <input type="radio" value="False"  name="act" checked>Désactiver 
                                                        @endif
                                                    
                                                    </div>
                                                </div>

                                                
                                        




                                                               

                                                                       <div class="pull-right margin-top-20">
                                                             <button type="button" class="btn btn-secondary" onclick="javascript:history.back();"> 
                                                                <i class="fa fa-arrow-left position-left"></i>
                                                                    Annuler
                                                                    
                                                                </button>

                                                                <button type="submit" class="btn btn-primary">
                                                                   Valider

                                                                    <i class="fa fa-arrow-right position-right"></i>
                                                                </button>
                                                            </div>

                                        </div>
                                </form>
                                        @endforeach
                        </div>
                </div>    
            </div>   
        </div>
    </div>
  </div>
 



@endsection