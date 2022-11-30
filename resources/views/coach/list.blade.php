@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Все тренера</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Тренера</li>
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
                    <h3 class="card-title">Тренера</h3>
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
                                <th class="project-state">Имя тренера</th>
                                <th class="project-state">Email тренера</th>
                                <th class="project-state">Город</th>
                                <th class="project-state">Создан</th>
                                <th class="project-state">Фото тренера</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coaches as $coach)
                                <tr id="cid{{ $coach->id }}">
                                    <td class="project-state">{{ $coach->id }}</td>
                                    <td class="project-state">{{ $coach->name }}</td>
                                    <td class="project-state">
                                        <span class="project-state">{{ $coach->email }}</span>
                                    </td>
                                    <td class="project-state">

                                        @if ($coach->city == null)
                                            <span class="project-state">У этого тренера нет города</span>
                                        @else
                                            <span class="project-state">{{ $coach->city->name }}</span>
                                        @endif
                                    </td>
                                    <td class="project-state">{{ $coach->created_at->format('d - M - Y') }}</td>
                                    <td class="project-state">
                                        <img alt="Avatar" class="table-avatar" src="{{ $coach->profile_image }}">
                                    </td>
                                    <td class="project-actions project-state">
                                        <a class="btn btn-info btn-sm" href="{{ route('coach.show', $coach['id']) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('coach.edit', $coach['id']) }}">
                                            <i class="fas fa-pencil-alt"></i></a>
                                            <a href="javascript:void(0)" onclick="deleteCoach({{ $coach->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                           
                                        <a href="javascript:void(0)" onclick="banUser({{ $coach->id }})"
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
                        $("#cid" + id).remove();
                    }
                });
            }
        }

        function deleteCoach(id) {
            if (confirm("Вы правда хотите удалить данную запись?")) {
                $.ajax({
                    url: '/coach/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        $("#cid" + id).remove();
                    }
                });
            }
        }
    </script>
@endsection
