@extends('admin.layouts.layout')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Список подписчиков</h3>
                        </div>



                            @if (count($comments))
                                <div class="table-responsive">

                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">#</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Text</th>
                                            <th>Post id</th>

                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{$comment->id}}</td>
                                                <td>{{$comment->email}}</td>
                                                <td>{{$comment->Name}}</td>
                                                <td>{!! $comment->text !!}</td>
                                                <td>{{$comment->post_id}}</td>
                                                <td>

                                                    <form action="{{route('comments.destroy',$comment->id)}}" method="post" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Подтвердите удаление')">
                                                            <i
                                                                class="fas fa-trash-alt"></i>
                                                        </button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="p-3">Коментариев пока нет...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div >
                            {{ $comments->links("pagination::bootstrap-4") }}
                        </div>
                    </div>
                    <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection

