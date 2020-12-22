@extends('home')




@section('admin')



 <div class="content-wrapper">
                <div class="content">
                    
 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title" style="text-align: center;">Ajouter un nouveau TVA</h5>
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Numéro TVA</th>
                                                <th style="text-align: center;">Taux TVA</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($tva as $t)
                                            <tr>
                                                <td >{{$t->id}} </td>
                                                <td style="text-align: center;">{{$t->tauxTva}} </td>

                                            </tr>
                                           @endforeach
                                           <tr> 

                                                <form class="form-horizontal"  method="POST" action="ajouttva">
                                                        {{ csrf_field() }}

                                                    <td colspan="2">  <input id="taux" type="number" class="form-control" name="taux" min="0" step="any"  placeholder="Entrer le nouveau taux . . . . .">  
                                                          @if ($errors->has('taux'))
                                                                    <span class="help-block" style="color: red;">
                                                                        <strong>{{ $errors->first('taux') }}</strong>
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