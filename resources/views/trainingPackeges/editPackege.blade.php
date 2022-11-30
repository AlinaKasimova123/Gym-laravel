@extends('layouts.user-layout')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pb-4">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать пакет</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                        <li class="breadcrumb-item active">Редактировать пакет</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    
        <form action="{{route('trainingPackeges.update_package',[$package['id']])}}" method="POST" enctype="multipart/form-data" class="w-75 m-auto">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" id="name" class="form-control" value="{{$package->name}}" name="name">
                                <label for="day">Цена</label>
                                <input type="text" id="price" class="form-control" value="{{$package->price}}" name="price">
                                <label for="sessions">Количество тренировок</label>
                                <input type="text" id="sessions" class="form-control" value="{{$package->sessions_number}}" name="sessions_number">

                                @if ($errors->any())
                            <div class="w-4/8 m-auto text-center">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-500 list-none">
                                        {{$error}}
                                    </li>
                                @endforeach

                            </div>
                                @endif
                            </div>
                           

                         



                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Отмена</a>
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
