@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Покупки</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Покупки</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">


            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Покупки</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="proj">
                        <thead>
                            <tr>
                                <th>ID пользователя</th>
                                <th>Email пользователя</th>
                                <th>Имя пользователя</th>
                                <th>Наименование пакета</th>
                                <th>Цена</th>
                                @role('admin')
                                    <th>Название зала</th>
                                    <th>Название города</th>
                                @endrole
                                @role('cityManager')
                                    <th>Название зала</th>
                                @endrole

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($revenues as $revenue)
                                <tr>
                                    <td>{{ $revenue->user->id }}</td>
                                    <td>{{ $revenue->user->email }}</td>
                                    <td> {{ $revenue->user->name }}</td>
                                    @if ($revenue->trainingPackage->name == null)
                                        <td>Нет названия пакета тренировок</td>
                                    @else
                                        <td> {{ $revenue->trainingPackage->name }}</td>
                                    @endif
                                    <td> {{ $revenue->price / 100 }} $</td>
                                    @role('admin')
                                        <td>{{ $revenue->user->gym->name }}</td>
                                        <td>{{ $revenue->user->city->name }}</td>
                                    @endrole
                                    @role('cityManager')
                                        <td>{{ $revenue->user->gym->name }}</td>
                                    @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
