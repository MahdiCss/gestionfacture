@extends('home')




@section('admin')



 <div class="content-wrapper">
                <div class="content">
                    
 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="text-bold card-title" style="text-align: center;">Listes des devises</h5>
                                    <table class="table">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Libelle</th>
                                                <th>Symbole</th>
                                                <th>Chiffre apres la virgule </th>
                                                <th>Taux Change</th>
                                                <th>Validation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           @foreach($devis as $d)
                                            <form class="form-horizontal"  method="POST" action="{{url('deviseupdate',$d->id)}}">
                                        {{ csrf_field() }}
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td> <input id="code" type="text" class="form-control" name="code" value="{{$d->code}}"> </td>
                                                 <td> <input id="lib" type="text" class="form-control" name="lib" value="{{$d->libelle}}"> </td>
                                                 <td>  <input id="smb" type="text" class="form-control" name="smb" value="{{$d->symbole}}">   </td>
                                                <td> <input id="cav" type="text" class="form-control" name="cav" value="{{$d->chifreAfterV}} "></td>
                                                 <td> <input id="tc" type="text" class="form-control" name="tc" value="{{$d->tauxChange}}"> </td>

                                                 <td>     <button type="submit" class="btn btn-success">
                                                                    Valider

                                                                    <i class="fa fa-arrow-right position-right"></i>
                                                                </button> </td>

                                            </tr>
                                            </form>
                                           @endforeach
                                       
                                                                                   </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                
           


            
            
      

                                                  
                                        

                                     


@endsection