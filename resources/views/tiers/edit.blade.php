@extends('home')




@section('admin')


<div class="content-wrapper">
    <div class="content">
            
            @foreach ($tier as $a)





            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                                    <h5 class="card-title" style="text-align: center;">Modifier {{$a->libelleTypeTier}} N° {{$a->id }}</h5>
                                    <legend class="text-bold margin-top-30">Personal Information</legend>
                          <form class="form-horizontal"  method="POST" action="update">
                                        {{ csrf_field() }}
                                        <div class="row">
                                                            <div class="col-md-6">
                                                                   <div class="form-group row margin-top-10">
                                                                            <div class="col-md-3">
                                                                                <label class="control-label col-form-label">Code Tier</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input id="codetier" type="text" class="form-control" name="codetier" value="{{ $a->code }}">

                                                                          
                                                                            </div>
                                                                        </div>
                                                                      

                                                                    <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">Libelle Tier</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                
                                                                                   <input id="libtier" type="text" class="form-control" name="libtier" value="{{ $a->nomPrenom}}">

                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">Adresse</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                
                                        <input id="adr" type="text" class="form-control" name="adr" value="{{ $a->adresse}}">

                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                        <div class="form-group row margin-top-10">
                                                                        <div class="col-md-3">
                                                                            <label class="control-label col-form-label">E_mail</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                
                                                                                   <input id="mail" type="text" class="form-control" name="mail" value="{{ $a->mail}}">

                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                          <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">fax</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="fax" type="text" class="form-control" name="fax" value="{{ $a->fax}}" >
                                                                                      
                                                                                    </div>
                                                                                </div>


                                                            

                                                            </div>
                                         
                                                            <div class="col-md-6">
                                                                            <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Télephone1</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="tel1" type="text" class="form-control" name="tel1" value="{{ $a->tel}}" >
                                                                                      
                                                                                    </div>
                                                                                </div>
                                                                                  <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Télephone2</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="tel2" type="text" class="form-control" name="tel2" value="{{ $a->tel1}}" >
                                                                                      
                                                                                    </div>
                                                                                </div>
                                                                                  <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Télephone3</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input id="tel3" type="text" class="form-control" name="tel3" value="{{ $a->tel2}}" >
                                                                                      
                                                                                    </div>
                                                                                </div>

                                                                                    <div class="form-group row margin-top-10">
                                                                                    <div class="col-md-3">
                                                                                        <label class="control-label col-form-label">Matricule Fiscal</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                        <input id="mf" type="text" class="form-control" name="mf" value="{{$a->matriculeFiscal}}" >
                                                                                      
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">Type Tier</label>
                                                    </div>
                                                    <div class="col-md-9">

                                                          <SELECT name="typetier" class="form-control">


                                                                   @foreach($type as $t)
                                                                    @if($a->idTypeTier==$t->id)

                                                             <option value="{{$t->id}}" selected> {{$t->libelle}}</option>

                                                                    @else
                                                                         <option value="{{$t->id}}" > {{$t->libelle}}</option>

                                                                         @endif
                                                                   @endforeach
                                                                  
                                                          </SELECT>

                                                    
                                                    </div>
                                                </div>

                                                




                                                                                <div class="pull-right margin-top-10">
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