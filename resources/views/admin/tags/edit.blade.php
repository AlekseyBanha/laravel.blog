@extends('admin.layouts.layout')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование тега</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit tag</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form role="form" method="post" action="{{route('tag.update',$tag->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Тег "{{$tag->title}}"</label>
                <input type="text" name="title" class="form-control" @error('title') is-invalid @enderror  id="title"  value="{{$tag->title}}">
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
    <!-- /.content -->

@endsection

