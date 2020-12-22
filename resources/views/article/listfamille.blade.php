@extends('home')




@section('admin')



 <div class="content-wrapper">
                <div class="content">
                    
 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                 <h5 class="text-bold card-title" style="text-align: center;">Ajouter une nouvelle famille</h5>
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                               
                                                <th>Code</th>
                                                <th style="text-align: center;">Libelle</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($fam as $f)
                                            <tr>
                                              
                                                <td >{{$f->code}} </td>
                                                <td style="text-align: center;">{{$f->libelle}} </td>

                                            </tr>
                                           @endforeach
                                           <tr> 

                                                <form class="form-horizontal"  method="POST" action="ajoutfamille">
                                                        {{ csrf_field() }}

                                              

                                                    <td>  <input id="code" type="text" class="form-control" name="code" placeholder="Entrer le code . . . . ." value="{{ old('code') }}">  
                                                          @if ($errors->has('code'))
                                                                    <span class="help-block" style="color: red;">
                                                                        <strong>{{ $errors->first('code') }}</strong>
                                                                    </span>
                                                         @endif
                                                         </td>
                                                    <td>  <input id="nomfamille" type="text" class="form-control" name="nomfamille" placeholder="Entrer le nom du type . . . . ." value="{{ old('nomfamille') }}">  
                                                          @if ($errors->has('nomfamille'))
                                                                    <span class="help-block" style="color: red;">
                                                                        <strong>{{ $errors->first('nomfamille') }}</strong>
                                                                    </span>
                                                         @endif
                                                    </td>


                                                    <td style="width: 10%">  <button type="submit" class="btn btn-primary">
                                                                    Ajouter

                                                                    <i class="fa fa-arrow-right position-right"></i>
                                                                </button> </td>


                                                </form>

                                           </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection