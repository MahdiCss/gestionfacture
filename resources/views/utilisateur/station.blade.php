@extends('home')




@section('admin')



 <div class="content-wrapper">
                <div class="content">
                    
 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title" style="text-align: center;">Listes des sites</h5>
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                             
                                                <th>Code</th>
                                                <th>Matricule fiscal </th>
                                                <th>Libelle</th>
                                                <th>Adresse </th>
                                                <th>Télephone    </th>
                                                <th>Fax</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($station as $s)
                                            <tr>
                                               
                                                <td> {{$s->code}} </td>
                                                <td>{{$s->matfiscal}} </td>
                                                 <td>{{$s->libelle}} </td>
                                                 <td style="width: 20%"> {{$s->adresse}}   </td>
                                                <td>{{$s->tel}} </td>
                                                 <td>{{$s->fax}} </td>

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
                                    <h5 class="card-title" style="text-align: center;">Ajout nouveau site</h5>
                                    <legend class="text-bold margin-top-30">Information du site</legend>
                            <form class="form-horizontal"  method="POST" action="ajouterstation">
                                        {{ csrf_field() }}
                                <div class="row">
                                            <div class="col-md-6">
                                              
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

                                                                 <div class="form-group{{ $errors->has('adr') ? ' has-error' : '' }} row">
                                                                <div class="col-md-3">
                                                                    <label class="control-label col-form-label">Adresse</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                  

                                                                    <input id="adr" type="text" class="form-control" name="adr" value="{{ old('adr') }}">
                                                                             @if ($errors->has('adr'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('adr') }}</strong>
                                                                    </span>
                                                                @endif
                                                                

                                                                </div>
                                                            </div>

                                                         

                                            

                                            </div>

                                            <div class="col-md-6">
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
                                                                @if ($errors->has('tel'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('tel') }}</strong>
                                                                    </span>
                                                                @endif
                                                                </div>
                                                            </div>
                                             
                                                <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }} row">
                                                    <div class="col-md-3">
                                                        <label class="control-label col-form-label">fax</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        
                                                             <input id="fax" type="text" class="form-control" name="fax" value="{{ old('fax') }}">

                                                         
                                                       
                                                           @if ($errors->has('fax'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('fax') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>
                                                </div>


                                                <div class="form-group{{ $errors->has('mf') ? ' has-error' : '' }} row">
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