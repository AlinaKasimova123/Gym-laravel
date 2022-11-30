@extends('layouts.user-layout')
@section('content')

<!-- Main content -->
<section class="content-wrapper content d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="error-page">
        <h2 class="headline text-danger">500</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Упс! Что-то пошло не так.</h3>
            <p>
                Мы работаем над этим.
                А пока <a href="{{ url('/main_page') }}" > вы можете вернуться на главную страницу</a>.
            </p>
        </div>
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
@endsection
