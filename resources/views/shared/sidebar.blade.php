<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="{{ auth()->user()->name }}">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->realname }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
    -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">系统管理</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="{{ route('ipaddress.list') }}">
                    <i class="fa fa-link"></i> <span>IP地址管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('project.list') }}">
                    <i class="fa fa-link"></i> <span>项目管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('order.list') }}">
                    <i class="fa fa-link"></i> <span>工单管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('status.list') }}">
                    <i class="fa fa-link"></i> <span>维修状态管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('type.list') }}">
                    <i class="fa fa-link"></i> <span>维修种类管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('department.list') }}">
                    <i class="fa fa-link"></i> <span>部门管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.list') }}">
                    <i class="fa fa-link"></i> <span>用户管理</span>
                </a>
            </li>
            <li>
                <a href="{{ route('statistics.list') }}">
                    <i class="fa fa-link"></i> <span>数据统计</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
