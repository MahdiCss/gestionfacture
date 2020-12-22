@extends('home')




@section('admin')


<div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title" style="text-align: center;">Listes des Articles selon le type</h4>
                            
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
                                                <th>Code Type Article</th>
                                                <th>Libelle</th>
                                                <th>Date de MAJ</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($art as $d)
                             <tr   onclick="location.href='{{URL::route('listarticle.show',$d->id)}}'" style="cursor: pointer;">
                                            
                                                <th scope="row"> {{$d->id}} </th>
                                                <td >  {{$d->code}}   </td>
                                                <td>  {{$d->libelle}}   </td>
                                                <td>  {{$d->j_ddm}}   </td>
                                                </a>
                                           
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