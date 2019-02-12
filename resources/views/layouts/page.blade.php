@extends('layouts.app')

@section('body_class', 'skin-blue sidebar-mini')

@section('body')
<div class="wrapper">
    <!-- Header -->
    @include('shared.header')

    @auth
        <!-- Sidebar -->
        @include('shared.sidebar')
    @endauth

    <!-- Content Wrapper. Contains page content -->
    <main class="content-wrapper">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                @include('shared.alert')
            </div>
        </div>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
            <!--
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        -->
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            @yield('content')

        </section>
        <!-- /.content -->
    </main>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('shared.footer')
</div>
@stop


@push('scripts')
<script>
$(function(){
    $('.sidebar-menu li:not(.treeview) > a').on('click', function(){
        var $parent = $(this).parent().addClass('active');
        $parent.siblings('.treeview.active').find('> a').trigger('click');
        $parent.siblings().removeClass('active').find('li').removeClass('active');
    });

    $(window).on('load', function(){
        $('.sidebar-menu a').each(function(){
            if(this.href === window.location.href){
                $(this).parent().addClass('active')
                        .closest('.treeview-menu').addClass('.menu-open')
                        .closest('.treeview').addClass('active');
            }
        });
    });
});
</script>
@endpush
