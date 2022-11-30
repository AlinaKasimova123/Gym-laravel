@extends('layouts.user-layout')
@section('content')
@if ($errors->any())
<div class="w-4/8 m-auto text-center">
    @foreach ($errors->all() as $error)
        <li class="text-red-500 list-none">
            {{ $error }}
        </li>
    @endforeach
</div>
    @endif
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   <div class="col-sm-6">  
                        <h1>Редактировать пользователя</h1>
                      </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Редактировать пользователя</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('allUsers.update', [$singleUser['id']]) }}" method="post" enctype="multipart/form-data"
                class="w-75 m-auto">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Редактирование</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" id="name" class="form-control" value="{{ $singleUser->name }}" name="name">
                                 </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" value="{{ $singleUser->email }}" name="email">

                                </div>
                                <div class="form-group">
                                    <label for="city">Номер карты</label>
                                    <input type="text" id="city" class="form-control" value="{{ $singleUser->national_id }}" name="city">

                                </div>
                                <div class="form-group">
                                    <label for="city">Пол</label>
                                    <select required class=" form-control" name="gym_id" id="gender">
                                        <option value="Выберите пол" disabled></option>
                                        <option value="female">Женщина</option>
                                        <option value="male">Мужчина</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="image">Картинка</label>
                                    <input type="file" class="form-control" id="image" name="profile_image" value="{{old('profile_image') ?? asset($singleUser->profile_image)}}">
                                </div>
                                <div class="form-group">
                                    <label for="day">Дата рождения</label>
                                    <input type="date" id="day_of_birth" class="form-control" value="{{$singleUser->birth_day}}" name="day">
                                </div>
                                <div class="form-group">
                                    <label for="city">Город</label>
                                    <input type="text" id="city" class="form-control" value="{{ $singleUser->city->name }}" name="city">
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Отмена</a>
                        <input type="submit" value="Обновить" class="btn btn-warning float-right">
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
