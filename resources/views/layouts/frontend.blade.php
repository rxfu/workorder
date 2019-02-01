@extends('layouts.app')

@section('body_class', 'skin-blue layout-top-nav')

@section('body')
<div class="wrapper">
    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ url('/') }}" class="navbar-brand"><b>图书馆</b>工单报修系统</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @guest
                        <li>
                            <a href="{{ route('login') }}">登录</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <main class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @include('shared.alert')
                </div>
            </div>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
            | Your Page Content Here |
            -------------------------->

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
    </main>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('shared.footer')
</div>
@stop
