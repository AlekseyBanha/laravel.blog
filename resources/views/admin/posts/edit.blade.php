@extends('admin.layouts.layout')


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование статьи {{$post->title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
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
                        <!-- Default box -->
                        <div class="card-body">
                            <form role="form" method="post" action="{{route('posts.update',$post->id)}}"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                               value="{{$post->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Цитата</label>
                                        <textarea class="form-control" id="description" rows="3"
                                                  name="description">{{$post->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Контент</label>
                                        <textarea class="form-control" id="content" rows="6"
                                                  name="content">{{$post->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id"> Категория</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            @foreach($categories as $k=>$v)
                                                <option value="{{$k}}"
                                                        @if($k==$post->category_id) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Multiple</label>
                                        <select class="select2" multiple="multiple" id="tags" name="tags[]"
                                                data-placeholder="Выбор тегов" style="width: 100%;">
                                            @foreach($tags as $k=>$v)
                                                <option value="{{$k}}"
                                                        @if(in_array($k,$post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input"
                                                       id="thumbnail">
                                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                                            </div>

                                        </div>

                                        <div class="mt-5"><img src="{{$post->getImage()}}" width="175" alt=""></div>
                                        @if($post->thumbnail)
                                        <a  class="btn btn-primary mt-2" href="{{ route('delete',$post->id) }}">Удалить изображение</a>
                                            @endif
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection

