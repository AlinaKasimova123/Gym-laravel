@extends('layouts.user-layout')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
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
                        <h1>Новый пользователь</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Создать нового пользователя</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('allUsers.store') }}" method="post" enctype="multipart/form-data" class="w-75 m-auto">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <h6 class="alart-success">{{ session('status') }}</h6>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Создать</h3>
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
                                    <input autofocus required minlength="3" maxlength="50" type="text" id="name"
                                        class="form-control" value="" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required type="email" id="email" class="form-control" value="" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="email">Пароль</label>
                                    <input required type="password" id="password" class="form-control" value="" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="city">Пол</label>
                                    <select required class=" form-control" name="gym_id" id="city">
                                        <option value="Выберите пол" disabled selected>Выберите ваш пол</option>
                                        <option value="female">Женщина</option>
                                        <option value="male">Мужчина</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="image">Картинка</label>
                                    <input type="file" class="form-control" id="image" name="profile_image">
                                </div>
                                <div class="form-group">
                                    <label for="day">Дата рождения</label>
                                    <input type="date" id="day_of_birth" class="form-control" name="day">
                                </div>
                                <div class="form-group">
                                    <label for="city">Город</label>
                                    <input type="text" id="city" class="form-control" name="city">
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
