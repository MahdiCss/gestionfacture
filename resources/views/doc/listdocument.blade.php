@extends('home')




@section('admin')


<div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title" style="text-align: center;">Listes des Documents</h4>
                            
                        </div>
                    </div>

                  <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                    
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Code Document</th>
                                                <th>Libelle</th>
                                                <th>Titre</th>
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($document as $d)

                             <tr >                  
                                            
                                                <td scope="row" onclick="location.href='{{URL::route('listdocument.show',$d->id)}}'" style="cursor: pointer;"> {{$d->id}} </td>
                                                <td onclick="location.href='{{URL::route('listdocument.show',$d->id)}}'" style="cursor: pointer;">  {{$d->code}}   </td>
                                                <td onclick="location.href='{{URL::route('listdocument.show',$d->id)}}'" style="cursor: pointer;">  {{$d->libelle}}   </td>
                                                <td onclick="location.href='{{URL::route('listdocument.show',$d->id)}}'" style="cursor: pointer;">  {{$d->titre}}   </td>

                                               

                                             
                                           
                                            </tr>

                                       
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
     
                </div>
            </div>





@endsection