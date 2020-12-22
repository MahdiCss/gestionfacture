@extends('home')




@section('admin')

<style>

.help-block{
    color:red;
}


</style>
 <div class="content-wrapper">
    <div class="content">
            
            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Ajouter un utilisateur</h5>
                                    <legend class="text-bold margin-top-30">Personal Information</legend>
                            <form class="form-horizontal"  method="POST" action="ajouter">
                                        {{ csrf_field() }}
                                <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row margin-top-10">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Nom et Prénom</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                         @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                         @endif
                                                    </div>
                                                </div>


                                                            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Login</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}">

                                                                @if ($errors->has('login'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('login') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>



                                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row margin-top-10">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Adresse E_mail</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-user"></i>
                                                                        </span>
                                                                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                                           
                                                                    </div>
                                                                </div>
                                                            </div>

                                                                 <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Télephone</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-phone"></i>
                                                                        </span>

                                                                    <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}">
                                                                </div>

                                                                </div>
                                                            </div>

                                                               <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Code User</label>
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

                                            

                                            </div>

                                            <div class="col-md-6">
                                             
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Mot De Passe</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            <i class="fa fa-key"></i>
                                                        </span>
                                                             <input id="password" type="password" class="form-control" name="password">

                                                         
                                                        </div>
                                                           @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>


                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Confirmer MDP</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                            <i class="fa fa-key"></i>
                                                        </span>
                                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                            @if ($errors->has('password_confirmation'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Role</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="role" class="form-control">
                                                                   @foreach($type as $t)

                                                                    <option value="{{$t->id}}"> {{$t->libelle}}</option>



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>
                                                                       <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Station</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="station" class="form-control">
                                                                   @foreach($stat as $s)

                                                                    <option value="{{$s->id}}"> {{$s->libelle}}</option>



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
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