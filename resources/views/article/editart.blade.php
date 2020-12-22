@extends('home')




@section('admin')


<div class="content-wrapper">
    <div class="content">
            
            @foreach ($art as $a)





            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Modifier Article N° {{$a->id }}</h5>
                                    <legend class="text-bold margin-top-30">Personal Information</legend>
                          <form class="form-horizontal"  method="POST" action="update">
                                        {{ csrf_field() }}
                                        <div class="row">
                                                            <div class="col-md-6">
                                                                   <div class="form-group row margin-top-10">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label col-form-label">Code Article</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input id="codeart" type="text" class="form-control" name="codeart" value="{{ $a->code }}">
                                                                                 @if ($errors->has('codeart'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('codeart') }}</strong>
                                                                    </span>
                                                         @endif

                                                                          
                                                                            </div>
                                                                        </div>
                                                                      

                                                                    <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">Libelle Article</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                
                                                                                   <input id="libart" type="text" class="form-control" name="libart" value="{{ $a->libelle}}">
                                                                             @if ($errors->has('libart'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('libart') }}</strong>
                                                                    </span>
                                                         @endif

                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">Libelle Courte</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                
                                                                                   <input id="libc" type="text" class="form-control" name="libc" value="{{ $a->libelleCourte}}">
                                                                                 @if ($errors->has('libc'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('libc') }}</strong>
                                                                    </span>
                                                         @endif
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">Marge Bénéficiaire</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                
                                                                                   <input id="mb" type="text" class="form-control" name="mb" value="{{ $a->margeB}}">
                                                                                 @if ($errors->has('mb'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('mb') }}</strong>
                                                                    </span>
                                                         @endif
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                          <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Prix Unitaire HT</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="prixht" type="number" class="form-control" name="prixht" value="{{ $a->prixuht}}" step="any" min="1">
                                                                                        @if ($errors->has('prixht'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('prixht') }}</strong>
                                                                    </span>
                                                         @endif

                                                                                      
                                                                                    </div>
                                                                                </div>


                                                            

                                                            </div>
                                         
                                                            <div class="col-md-6">
                                                                            <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Quantité</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="qte" type="number" class="form-control" name="qte" value="{{ $a->qteStock}}" min="0">
                                                                                         @if ($errors->has('qte'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('qte') }}</strong>
                                                                    </span>
                                                         @endif
                                                                                      
                                                                                    </div>
                                                                                </div>

                                                                                    <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Type Article</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="type" class="form-control">
                                                                   @foreach($type as $t)


                                                                            @if ($t->id==$a->idTypeArticle)
                                                        <option value="{{$t->id}}" selected> {{$t->libelle}}</option>
                                                                            @else

                                                    <option value="{{$t->id}}" > {{$t->libelle}}</option>
                                                    @endif
                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>


                                                 <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Taux TVA</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="taux" class="form-control">
                                                                   @foreach($tva as $tv)


                                                                            @if ($tv->id==$a->idTva)
                                                                    <option value="{{$tv->id}}" selected> {{$tv->tauxTva}}</option>
                                                                            @else
                                                                         <option value="{{$tv->id}}" > {{$tv->tauxTva}}</option>

                                                                            @endif
                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>
                                                    






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
                                        
                        </div>
                </div>    
            </div>   
        </div>
    </div>
  </div>
 

@endforeach

@endsection