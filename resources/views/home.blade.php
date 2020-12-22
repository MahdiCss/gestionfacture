<!DOCTYPE HTML>
<html>

<head>
    <title>ASM-WORK_SPACE</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('asm-logo130x41.png')}}" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('lib/css/jquery.dataTables.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('assets/icons/fontawesome/styles.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/css/chartist.min.css')}}">

    <script type="text/javascript" src="{{asset('lib/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('lib/js/chartist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/app.min.js')}}"></script>

     <script type="text/javascript" src="{{asset('lib/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages_datatables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('lib/js/devis.js')}}"></script>

    <script src="{{asset('https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js')}}"></script>


    

   
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-toggleable-md">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
                            <span>
                                <i class="fa fa-code-fork"></i>
                            </span>
                        </button>

                            <button class="navbar-toggler navbar-toggler-left" type="button" id="toggle-sidebar">
                                <span>
                                   <i class="fa fa-align-justify"></i>
                                </span>
                            </button>

                        <a class="navbar-brand logo" href="#">
                            <img src="{{asset('asm-logo130x41.png')}}" alt="Asm">
                        </a>

                            <div class="collapse navbar-collapse" id="navbarNav">
                                <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
                                    <span>
                                        <i class="fa fa-align-justify"></i>
                                    </span>
                                </button>
                                
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle dropdown-has-after" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                      @if (Session::has('nompre'))

                                                        {{  Session::get('nompre')}}

                                                      @endif
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                    
                                                        <a class="dropdown-item" href="{{ url('/logout') }}">
                                                            <i class="fa fa-sign-out"></i> <span>Déconnexion</span></a>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                
                            </div>
    </nav>
    <!-- /NAVBAR -->

    <div class="page-container">
        <div class="page-content">
            <!-- inject:SIDEBAR -->

            <div id="sidebar-main" class="sidebar sidebar-default">
            <div class="sidebar-content">
                            <ul class="navigation">
                                <li class="navigation-header">
                                    <span>Main</span>
                                    <i class="icon-menu"></i>
                                </li>

                                <li>
                                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Accueil</span></a>
                                </li>
                            

                                <li class="navigation-header">
                                    <span>Forms</span>
                                    <i class="icon-menu"></i>
                                </li>


                                       @if (Session::has('type')) 

                                        @if (Session::get('type')==13) 
                                <li>
                                    <a href="index.html"><i class="fa fa-group"></i> <span>Gérer utilisateurs</span></a>
                                    <ul>
                                        <li><a href="{{ url('/listclient') }}">*_ Liste des utilisateurs </a></li>
                                        <li><a href="{{ url('/ajoutclient') }}">*_ Ajout nouveau utilisateur </a></li>
                                        <li><a href="{{ url('/listtypeuser') }}">*_ Ajout nouveau role </a></li>
                                        <li><a href="{{ url('/liststation') }}">*_ Ajout nouveau site </a></li>
                                      
                                      
                                    </ul>
                                </li>
                              
                                         @endif
                                     @endif



                        @if (Session::has('type'))

                            @if  (Session::get('type')==1 ||Session::get('type')==13)

                                                     
                                <li>
                                    <a href="index.html"><i class=" fa fa-shopping-cart"></i> <span>Gérer articles</span></a>
                                    <ul>
                                        <li><a href="{{ url('/listarticle') }}">*_ Liste des articles</a></li>
                                        <li><a href="{{ url('/ajoutarticle') }}">*_ Ajout nouveau article</a></li>
                                        @if  (Session::get('type')==13)
                                        <li><a href="{{ url('/listtypearticle') }}">*_ Ajout nouveau type</a></li>
                                        <li><a href="{{ url('/listfamille') }}">*_ Ajout nouvel famille</a></li>
                                        <li><a href="{{ url('/listmarque') }}">*_ Ajout nouvel marque</a></li>
                                        @endif
                                    </ul>
                                </li>

                            @endif
                        @endif

                              

                                    @if (Session::has('type'))

                                                 @if  (Session::get('type')==1||Session::get('type')==13)
                                                   <li>
                                    <a href="index.html"><i class="fa fa-edit "></i> <span>Gérer document</span></a>
                                    <ul>
                                        <li><a href="{{ url('/listdocument') }}">*_ Suivie des documents</a></li>
                                        <li><a href="{{ url('/ajoutdoc') }}">*_ Ajout nouveau document</a></li>
                                        @if  (Session::get('type')==13)
                                        <li><a href="{{ url('/listdevise') }}">*_ Ajout nouvel devise</a></li>
                                        <li><a href="{{ url('/listtva') }}">*_ Ajout nouveau TVA</a></li>
                                        @endif
                                        
                                     
                                        
                                    </ul>
                                </li>
                                     <li>
                                    <a href="index.html"><i class="fa fa-address-card-o"></i> <span>Gérer tiers</span></a>
                                    <ul>
                        
                                        <li><a href="{{ url('/listtiers') }}">*_ Liste des tiers</a></li>
                                        <li><a href="{{ url('/ajouttier') }}">*_ Ajout des tiers</a></li>
                                  
                                                        
                                    </ul>
                                </li>
                                           @elseif (Session::get('type')==112) 

                                             <li>
                                    <a href="index.html"><i class="fa fa-edit "></i> <span>Gérer document</span></a>
                                    <ul>
                                        <li><a href="{{ url('/listdocument') }}">*_ Suivie des documents</a></li>
                                         <li><a href="{{ url('/ajoutdoc') }}">*_ Ajout nouveau document</a></li>
                                        
                                     
                                        
                                    </ul>
                                </li>

                                                     <li>
                                    <a href="index.html"><i class="fa fa-address-card-o"></i> <span>Gérer Tiers</span></a>
                                    <ul>
                        
                                        <li><a href="{{ url('/listtiers') }}">*_ Liste des clients</a></li>
                                        <li><a href="{{ url('/ajouttier') }}">*_ Ajout nouveau client</a></li>
                                  
                                                        
                                    </ul>
                                </li>




                                           @else

                                                                 <li>
                                    <a href="index.html"><i class="fa fa-address-card-o"></i> <span>Gérer tiers</span></a>
                                    <ul>
                        
                                        <li><a href="{{ url('/listtiers') }}">*_ Liste des clients</a></li>
                                        <li><a href="{{ url('/ajouttier') }}">*_ Ajout nouveau client</a></li>
                                  
                                                        
                                    </ul>
                                </li>





                                           @endif

                                           @endif
                                       
                               
                            </ul>
            </div>
            </div>

            <!-- inject:/SIDEBAR -->

            <!-- PAGE CONTENT -->
                @yield('admin')
            <!-- /PAGE CONTENT -->
        </div>
    </div>
</body>

</html>