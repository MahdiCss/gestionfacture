@extends('home')




@section('admin')


 <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title" style="text-align: center;">Liste des utilisateurs</h4>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block">
                                   
                                    <table class="display datatable table table-stripped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nom d'utilisateur</th>
                                                <th>Nom</th>
                                               
                                                <th>Role</th> 
                                                <th>Télephone </th>
                                                <th>mail</th>
                                                <th> Active </th>
                                                <th> Edit </th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Nom d'utilisateur</th>
                                                <th>Nom</th>
                                                
                                                <th>Role</th> 
                                               <th>Télephone </th>
                                                <th>mail</th>
                                                <th> Active </th>
                                                <th> Edit </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                           
                                           @foreach($users as $usr)
                                           <?php
                                                    $test=0;
                                                        $test1=0;


                                                    ?>
                                               <tr>
                                                <td> {{$usr->login}} </td>
                                                <td>   {{$usr->nomPrenom}}   </td>
                                              
                                                @foreach ($type as $t)
                                                @if ($usr->idType==$t->id)
                                                <td>   {{$t->libelle}}   </td>
                                                <?php
                                                                $test=1;
                                                                    
                                                            ?>  
                                                @endif
                                                @endforeach
                                                 @if ($test==0)

                                                        <td style="color: blue;"> NON  Attribué</td>

                                                    @endif

                                               <td> {{$usr->tel}}  </td>

                                               <td> {{$usr->mail}}  </td>
                                              
                                                    
                                                    @if ($usr->active==True)


                                                        <td style="color: green;">  <i class="fa fa-check"></i> </td>

                                                    @else

                                                            <td style="color: red;">  <i class="fa fa-remove"></i> </td> 


                                                    @endif
                                                

                                               
                                                 <td>    <a href="{{URL::route('listclient.edit',$usr->id)}}" class="btn btn-primary pull-left ">Editer <i class=" fa fa-edit "></i></a> </td>
                          
                                                </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
     
                </div>
            </div>

<script type="text/javascript">


$("form.has-confirm").submit(function (e) {
  var $message = $(this).data('message');
  if(!confirm($message)){
    e.preventDefault();
  }
});

</script>


@endsection