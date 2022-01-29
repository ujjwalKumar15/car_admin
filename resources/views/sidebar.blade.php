 
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ujjwal</a>
        </div>
 </div>
         
         
         <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
              
              <ul class="nav ">
               <li class="nav-item">
                  <a href="{{ url('color') }}" class="nav-link ">
                    <i class="fas fa-palette nav-icon"></i>
                    <p>Colors
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ url('Addcolor') }}" class="nav-link">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i class="fas fa-plus-circle"></i>
                        <p>Add</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('list') }}" class="nav-link">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <i class="fas fa-list"></i>
                        <p>List</p>
                      </a>
                      </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <!-- Authentication -->
           <form method="POST" action="{{ route('logout') }}">
              @csrf
  
              <x-jet-dropdown-link href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                              this.closest('form').submit();">
               <i class="fas fa-sign-out-alt">   {{ ('Log Out') }}</i>
              </x-jet-dropdown-link>
          </form>
                  
                </li>
                
              </ul>
              </nav>
   </aside>
      <!-- /.control-sidebar -->
  
  