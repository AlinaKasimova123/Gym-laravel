@extends('layouts.user-layout')
@section('title')
    Empty Statement
@endsection
@section('content')
    {{-- <div class="text-center mt-5 mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success ">Создать пост</a>
</div> --}}
    <div class="content-wrapper d-flex justify-content-center align-items-center bg-white">
            <div class="row justify-content-center">
                    @role('user')
                            <div class="col-lg-12 col-12 card mx-2">
                                <div class="card-header border-0 text-center font-weight-bold"><p class="d-flex flex-column text-center font-weight-bold"
                                >Ваше имя:
                                <span class="text-muted">{{ $singleUser->name }}</span></p></div>
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                            Ваш email:
                                            <span class="text-muted">{{ $singleUser->email }}</span>
                                        </p>
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                        Ваш город:
                                            <span class="text-muted">{{ $city }}</span>
                                        </p>
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                            Ваш номер карты:
                                            <span class="text-muted">{{ $singleUser->national_id }}</span>
                                        </p>
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                        Количество оставшихся тренировок:
                                            <span class="text-muted">{{ $singleUser->total_sessions }}</span>
                                        </p>
                                        <p class="d-flex flex-column text-center font-weight-bold">
                                        Название зала:
                                            <span class="text-muted">{{$gym}}</span>
                                        </p>
                                    </div>
                                </div>
                    @endrole
                </div>
    </div>
@endsection