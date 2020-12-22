@extends('home')




@section('admin')

<style>

.help-block{
    color:darkred;
}
.tel2{
    display: none;
}
.tel3{
    display: none;
}
</style>
 <div class="content-wrapper">
    <div class="content">
            
            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Ajouter des Tiers</h5>
                                    <legend class="text-bold margin-top-30">Information des tiers</legend>
                            <form class="form-horizontal"  method="POST" action="ajoutertier">
                                        {{ csrf_field() }}
                                <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} row margin-top-10">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Code </label>
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

                                                 <div class="form-group{{ $errors->has('mf') ? ' has-error' : '' }} row margin-top-10">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Matricule Fiscal</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input id="mf" type="text" class="form-control" name="mf" value="{{ old('mf') }}">
                                                         @if ($errors->has('mf'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('mf') }}</strong>
                                                                    </span>
                                                         @endif
                                                    </div>
                                                </div>


                                                            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Nom Prénom</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}">

                                                                @if ($errors->has('nom'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('nom') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>



                                                            <div class="form-group{{ $errors->has('adr') ? ' has-error' : '' }} row margin-top-10">
                                                                <div class="col-md-3">
                                                        <label class="control-label col-form-label">Adresse</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                     
                                                                           <input id="adr" type="text" class="form-control" name="adr" value="{{ old('adr') }}">

                                                                           
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    <div class="form-group{{ $errors->has('tel1') ? ' has-error' : '' }} row">
                                                         <div class="col-md-3">
                                                             <label class="control-label col-form-label">Télephone 1</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input id="tel1" type="text" class="form-control" name="tel1" value="{{ old('tel1') }}">

                                                                </div>

                                                                <div class="t1" id="t1">
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-primary" onclick="verif()">
                                                                   

                                                                    <i class="fa fa-plus"></i>
                                                                </button>

                                                                </div>
                                                            </div>
                                                            </div>

                                                                <div class="tel2" id="tel2">
                                                                <div class="form-group{{ $errors->has('tel2') ? ' has-error' : '' }} row">
                                                         <div class="col-md-3">
                                                             <label class="control-label col-form-label">Télephone 2</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input id="tel2" type="text" class="form-control" name="tel2" value="{{ old('tel2') }}">

                                                                </div>
                                                                <div class="t2" id="t2">
                                                                  <div class="col-md-2">
                                                                    <button type="button" class="btn btn-primary" onclick="verif2()">
                                                                   

                                                                    <i class="fa fa-plus"></i>
                                                                </button>

                                                                </div>
                                                            </div>
                                                            </div>
                                                                        </div>


                                                             <div class="tel3" id="tel3">
                                                                <div class="form-group{{ $errors->has('tel3') ? ' has-error' : '' }} row">
                                                         <div class="col-md-3">
                                                             <label class="control-label col-form-label">Télephone 3</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <input id="tel3" type="text" class="form-control" name="tel3" value="{{ old('tel3') }}">

                                                                </div>
                                                            </div>
                                                        </div>

                                                    

                                            </div>

                                            <div class="col-md-6">
                                                

                                                               <div class="form-group{{ $errors->has('Fax') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Fax</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="Fax" type="text" class="form-control" name="Fax" value="{{ old('Fax') }}">

                                                                @if ($errors->has('Fax'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('Fax') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>

                                                                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Adresse mail</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                          
                                                             <input id="email" type="email" class="form-control" name="email">

                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                        <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Type Tiers</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="typetier" class="form-control">
                                                                   @foreach($type as $t)

                                                                    <option value="{{$t->id}}"> {{$t->libelle}}</option>



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>
                                                  <div class="form-group{{ $errors->has('ch') ? ' has-error' : '' }} row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Soumis TVA</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                        
                                            <input id="ch1" type="radio" class="form-control" name="ch" value="1"> Oui 
                                            <input id="ch2" type="radio" class="form-control" name="ch" value="0" >Non 
                                                                
                                                        </div>
                                                          @if ($errors->has('ch'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('ch') }}</strong>
                                                                    </span>
                                                                @endif
                                                    </div>
                                                </div>
                                              


                                                 <div class="pull-right margin-top-20">
                                                                <button type="reset" class="btn btn-secondary" onclick="redo()">
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
                                </div>
                            </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

function verif(){

document.getElementById('tel2').style.display="inline";
document.getElementById('t1').style.display="none";


}
function verif2(){

document.getElementById('tel3').style.display="inline";
document.getElementById('t2').style.display="none";


}
function redo(){

document.getElementById('tel2').style.display="none";

document.getElementById('t1').style.display="inline";
    document.getElementById('tel3').style.display="none";
document.getElementById('t2').style.display="inline";

}


</script>


@endsection