@extends('layouts.user-layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <!-- Errors Section -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-sm-6">
                        <h1>Сити-менеджер</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Редактировать сити-менеджера</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('cityManager.update', [$singleUser['id']]) }}" method="post" enctype="multipart/form-data"
                class="w-75 m-auto">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Редактиование</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" id="name" class="form-control" value="{{ $singleUser->name }}"
                                        name="name">
                                </div>

                                <div class="form-group">
                                    <label for="pass">Пароль</label>
                                    <input type="password" id="pass" class="form-control"
                                        value="{{ $singleUser->password }}" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" value="{{ $singleUser->email }}"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="image">Загрузить фото</label>
                                    <input type="file" class="form-control" id="image" name="profile_image"
                                        value="{{ asset($singleUser->profile_image) }}">
                                </div>
                                <div class="form-group">
                                    <label for="nationalID">ID карты</label>
                                    <input type="text" id="nationalID" class="form-control" name="national_id"
                                        value="{{ $singleUser->national_id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Отмена</a>
                        <input type="submit" value="Save Changes" class="btn btn-warning float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
