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
                        <h1>Создать сити-менеджера</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Новый сити-менеджер</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <form action="{{ route('cityManager.store') }}" method="post" enctype="multipart/form-data"
                class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Добавление</h3>
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
                                    <input type="text" id="name" required class="form-control" placeholder="Ваше имя"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Пароль</label>
                                    <input type="password" required id="pass" class="form-control"
                                        placeholder="Ваш пароль" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" required id="email" class="form-control" placeholder="Ваш email"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="image">Загрузить кратинку</label>
                                    <input type="file" class="form-control" id="image" name="profile_image">
                                </div>
                                <div class="  form-group">
                                    <label for="nationalID">ID карты</label>
                                    <input type="text" required id="nationalID" class="form-control" name="national_id"
                                        placeholder="Введите номер карты от 10 до 17 символов.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Отмена</a>
                        <input type="submit" value="Сохранить изменения" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
