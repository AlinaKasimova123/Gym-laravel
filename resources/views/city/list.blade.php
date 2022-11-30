@extends('layouts.user-layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Все города</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная страница</a></li>
                            <li class="breadcrumb-item active">Города</li>
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
                    <h3 class="card-title">Города</h3>
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
                                <th class="project-state"> ID </th>
                                <th class="project-state">Название города</th>
                                <th class="project-state">Имя сити-менеджера</th>
                                <th class="project-state">Создан</th>
                                <th class="project-state"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCities as $city)
                                <tr id="cid{{ $city->id }}">

                                    <td class="project-state">{{ $city->id }}</td>
                                    <td class="project-state">{{ $city->name }}</td>
                                    @if ($city->manager == null)
                                        <td class="project-state">У этого города нет менеджеров</td>
                                    @else
                                        <td class="project-state">{{ $city->manager->name }}</td>
                                    @endif
                                    <td class="project-state">{{ $city->created_at->format('d - M - Y') }}</td>
                                    <td class="project-actions project-state">
                                        <a class="btn btn-info btn-sm" href="{{ route('city.show', $city->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm text-white"
                                            href="{{ route('city.edit', $city->id) }}">
                                            <i class="fas fa-pencil-alt"></i></a>

                                        <a href="javascript:void(0)"
                                            onclick="deleteCity({{ $city->id }},{{ $city->manager_id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
        function deleteCity(id, manager) {
            if (manager > 0) {
                alert('У этого города есть менеджер, поэтому он не может быть удален')
            } else {
                if (confirm("Вы правда хотите удалить данную запись?")) {
                    $.ajax({
                        url: '/cities/' + id,
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

        }
    </script>
@endsection
