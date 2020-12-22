@extends('home')




@section('admin')


<div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title" style="text-align: center;">Listes des Tiers selon le type</h4>
                            
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
                                                <th>Code Type Tier</th>
                                                <th>Libelle</th>
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($tier as $t)
                             <tr   onclick="location.href='{{URL::route('listtiers.show',$t->id)}}'" style="cursor: pointer;">
                                            
                                                <th scope="row"> {{$t->id}} </th>
                                                <td >  {{$t->code}}   </td>
                                                <td>  {{$t->libelle}}   </td>
                                                
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