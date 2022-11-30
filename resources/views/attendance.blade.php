<?php use Carbon\Carbon;?>
@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Посещение зала</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Посещение зала</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Посещение зала</h3>
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
                                <th class="project-state">Имя</th>
                                <th class="project-state">Email</th>
                                <th class="project-state">Название тренировки</th>
                                <th class="project-state">Время посещения</th>
                                <th class="project-state">Дата посещения</th>
                                @role('admin|cityManager')<th class="project-state">Зал</th>@endrole
                                @role('admin')<th class="project-state">Город</th>@endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                <tr id="did{{ $attendance->id }}">
                                    <td class="project-state">{{ $attendance->name }}</td>
                                    <td class="project-state">{{ $attendance->email }} </td>
                                    <td class="project-state">{{ $attendance->training_session_name}} </td>
                                    <td class="project-state">{{ $attendance->attendance_time }} </td>
                                    <td class="project-state">{{ Carbon::parse($attendance->attendance_at)->format('Y-m-d') }} </td>
                                    @role('admin|cityManager')<td class="project-state">{{ $attendance->gym_name }}</td>@endrole
                                    @role('admin')<td class="project-state">{{ $attendance->gym_city }}</td>@endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
   <!--  <script>
        function deletegymManager(id) {
            if (confirm("Do you want to delete this record?")) {
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
    </script> -->
@endsection
