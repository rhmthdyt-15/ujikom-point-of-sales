<header id="header" class="header">
     <div class="top-left">
         <div class="navbar-header">
             <a class="navbar-brand" href="./"><img src="{{ asset('templates/images/logo3.png') }}" alt="Logo"></a>
             <a class="navbar-brand hidden" href="./"><img src="{{ asset('templates/images/logo2.png') }}" alt="Logo"></a>
             <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
         </div>
     </div>
     <div class="top-right">
         <div class="header-menu">
             <div class="user-area dropdown float-right">
                 <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="user-avatar rounded-circle" src="{{ url(auth()->user()->foto ?? '') }}" alt="User Avatar">
                 </a>

                 <div class="user-menu dropdown-menu">
                     <a class="nav-link" href="{{ route('user.profil') }}"><i class="fa fa-user"></i>My Profile</a>

                     <a class="nav-link" href="{{ route('user.edit') }}"><i class="fa fa-cog"></i>Settings</a>

                     <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit()">
                         <i class="fa fa-power-off"></i>Logout</a>
                 </div>
             </div>

         </div>
     </div>
 </header>

 <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
     @csrf
  </form>