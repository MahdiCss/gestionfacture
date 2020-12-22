@extends('home')




@section('admin')



 <div class="content-wrapper">
                <div class="content">
                    
 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title" style="text-align: center;">Ajouter un nouveau type</h5>
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th style="text-align: center;">Libelle</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($art as $ar)
                                            <tr>
                                                <td> {{$ar->id}}</td>
                                                <td >{{$ar->code}} </td>
                                                <td style="text-align: center;">{{$ar->libelle}} </td>

                                            </tr>
                                           @endforeach
                                           <tr> 

                                                <form class="form-horizontal"  method="POST" action="ajouttypeart">
                                                        {{ csrf_field() }}

                                                 <td>  <input id="id" type="text" class="form-control" name="id" placeholder="Entrer le numero du type . . . . ." value="{{ old('id') }}">  
                                                          @if ($errors->has('id'))
                                                                    <span class="help-block" style="color: red;">
                                                                        <strong>{{ $errors->first('id') }}</strong>
                                                                    </span>
                                                         @endif
                                                         </td>

                                                    <td>  <input id="code" type="text" class="form-control" name="code" placeholder="Entrer le code . . . . ." value="{{ old('code') }}">  
                                                          @if ($errors->has('code'))
                                                                    <span class="help-block" style="color: red;">
                                                                        <strong>{{ $errors->first('code') }}</strong>
                                                                    </span>
                                                         @endif
                                                         </td>
                                                    <td>  <input id="nomtype" type="text" class="form-control" name="nomtype" placeholder="Entrer le nom du type . . . . ." value="{{ old('nomtype') }}">  
                                                          @if ($errors->has('nomtype'))
                                                                    <span class="help-block" style="color: red;">
                                                                        <strong>{{ $errors->first('nomtype') }}</strong>
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