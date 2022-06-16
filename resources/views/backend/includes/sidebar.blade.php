  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{route('website.index')}}">
       <img src="{{ asset('img/logo1.png')}}" style="width: 200px; height: 50px" class="logo-icon" alt="logo icon">
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">

      <li>
        <a href="{{route('dashboard.index')}}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Trang Chủ</span>
        </a>
      </li>
      <li>
        <a href="{{ route('categories.index')}}">
          <span class="menu-icon fas fa-dice-d20"></span> 
          <span>Loại Tin Tức</span>
        </a>
      </li>
      <li>
        <a href="{{ route('news.index')}}">
          <span class="menu-icon fas fa-dice-d6"></span>
          <span>Tin Tức</span>
        </a>
      </li>
      <li>
        <a href="{{ route('userGroups.index')}}">
          <span class="menu-icon fas fa-user-friends"></span> <span>Nhóm Nhân Viên</span>
         
        </a>
      </li>
      <li>
        <a href="{{ route('users.index')}}">
          <span class="menu-icon fas fa-user-alt"></span> <span>Nhân Viên</span>
        </a>
      </li>


      <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

    </ul>

   </div>
   <!--End sidebar-wrapper-->

