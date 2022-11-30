@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все менеджеры</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Проекты</li>
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
                    <h3 class="card-title">Проекты</h3>
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
                                <th class="project-state">ID</th>
                                <th class="project-state">Имя менеджера зала</th>
                                <th class="project-state">Email</th>
                                <th class="project-state">Фото профиля</th>
                                <th class="project-state">ID карты</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr id="did{{ $user->id }}">
                                    <td class="project-state">{{ $user->id }}</td>
                                    <td class="project-state">{{ $user->name }} </td>
                                    <td class="project-state">{{ $user->email }} </td>
                                    <td class="project-state"><img alt="Avatar" class="table-avatar"
                                            src="{{ asset($user->profile_image) }}"></td>
                                    <td class="project-state">{{ $user->national_id }} </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('gymManager.show', $user['id']) }}">

                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('gymManager.edit', $user['id']) }}">
                                            <i class="fas fa-pencil-alt"></i></a>

                                        <a href="javascript:void(0)" onclick="deletegymManager({{ $user->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                                        <a href="javascript:void(0)" onclick="banUser({{ $user->id }})"
                                            class="btn btn-dark btn-sm"><i class="fa fa-user-lock"></i></a>

                                    </td>
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
    <script>
        function banUser(id) {
            if (confirm("Вы правда хотите заблокировать данного пользователя?")) {
                $.ajax({
                    url: '/banUser/' + id,
                    type: 'get',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#did" + id).remove();
                    }
                });
            }
        }

        function deletegymManager(id) {
            if (confirm("Вы правда хотите удалить эту запись?")) {
                $.ajax({
                    url: '/gymManager/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#did" + id).remove();
                    }
                });
            }
        }
    </script>
@endsection
