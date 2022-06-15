  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.html">
       <img src="{{ asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Dashtreme Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">

      <li>
        <a href="{{route('dashboard.index')}}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Trang Chủ</span>
        </a>
      </li>
      <li>
        <a href="index.html">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Loại Tin Tức</span>
        </a>
      </li>
      <li>
        <a href="index.html">
          <i class="zmdi zmdi-view-dashboard"></i>
          <span class="menu-icon oi oi-list-rich"></span>
          <span>Tin Tức</span>
        </a>
      </li>
      <li>
        <a href="{{ route('userGroups.index')}}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Nhóm Nhân Viên</span>
        </a>
      </li>
      <li>
        <a href="index.html">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Nhân Viên</span>
        </a>
      </li>


      <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

