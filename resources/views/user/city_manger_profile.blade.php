@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Профиль менеджера зала</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Профиль менеджера зала</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- Profile Image -->
        <div class="d-flex ">
            <div class="card card-primary card-outline w-25 m-auto">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="imgs/avatar.png" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">Иванов Иван</h3>

                    <p class="text-muted text-center">Главный инженер</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Подписчики</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Подписки</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Друзья</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Редактировать</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
