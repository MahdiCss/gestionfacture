@extends('home')




@section('admin')

<style>

.help-block{
    color:darkred;
}
.tauxtva{
    display:none;
}

</style>
 <div class="content-wrapper">
    <div class="content">
            
            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Ajout d'un article</h5>
                                    <legend class="text-bold margin-top-30">Information de l'article</legend>
                            <form class="form-horizontal"  method="POST" action="ajouterart">
                                        {{ csrf_field() }}
                                <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} row margin-top-10">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Code article</label>
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


                                                            <div class="form-group{{ $errors->has('lib') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Libelle article</label>
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



                                                            <div class="form-group{{ $errors->has('libc') ? ' has-error' : '' }} row margin-top-10">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Libelle courte</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        
                                                                           <input id="libc" type="text" class="form-control" name="libc" value="{{ old('libc') }}">
                                                                     
                                                                           
                                                                    </div>
                                                                             @if ($errors->has('libc'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('libc') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>

                                                                 <div class="form-group{{ $errors->has('mb') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Marge bénéficiaire</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="mb" type="number" class="form-control" name="mb"  min="0.000" value="0.000" step="any" ">
                                                                      @if ($errors->has('mb'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('mb') }}</strong>
                                                                    </span>
                                                                @endif

                                                                </div>
                                                            </div>

                                                               <div class="form-group{{ $errors->has('pu') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Prix Unitaire</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="pu" type="float" class="form-control" name="pu"  min="1" value="1" step="any" ">

                                                                @if ($errors->has('pu'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('pu') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>


                                            </div>

                                            <div class="col-md-6">



                                                        <div class="form-group{{ $errors->has('qte') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Quantité en stock</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="qte" type="number" class="form-control" name="qte"  min="0.000" value="0.000" step="1.000">

                                                                @if ($errors->has('qte'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('qte') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>

                                                               <div class="form-group{{ $errors->has('remismax') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                            <label class="control-label col-form-label">Remise Max</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input id="remismax" type="number" class="form-control" name="remismax"  min="0" max="100" value="0" step="any">

                                                                @if ($errors->has('remismax'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('remismax') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>


                                                               <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Type article</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="typeart" class="form-control">
                                                                   @foreach($type as $t)

                                                                    <option value="{{$t->id}}"> {{$t->libelle}}</option>



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>
                                                                 <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Famille</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="famille" class="form-control">
                                                                   @foreach($famille as $f)

                                                                    <option value="{{$f->id}}"> {{$f->libelle}}</option>



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>

                                                      <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Marque</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="marque" class="form-control">
                                                                   @foreach($marque as $m)

                                                                    <option value="{{$m->id}}"> {{$m->libelle}}</option>



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
                                                        
                                            <input id="ch1" type="radio" class="form-control" name="ch" value="True" onclick="verif()"> Oui 
                                            <input id="ch2" type="radio" class="form-control" name="ch" value="False" onclick="verif()">Non 
                                                                
                                                        </div>
                                                          @if ($errors->has('ch'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('ch') }}</strong>
                                                                    </span>
                                                                @endif
                                                    </div>
                                                </div>


                                            
                                                <div class="tauxtva" id="tauxtva"> 
                                                 <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Taux TVA</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="taux" class="form-control">
                                                                   @foreach($tva as $tv)

                                                                    <option value="{{$tv->id}}"> {{$tv->tauxTva}}</option>



                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
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
if(document.getElementById('ch1').checked) {
  document.getElementById('tauxtva').style.display="inline";
}else if(document.getElementById('ch2').checked) {
 document.getElementById('tauxtva').style.display="none";
}
}


</script>


@endsection