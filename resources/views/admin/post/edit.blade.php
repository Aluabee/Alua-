@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

    {{--@include('layouts.message')--}}

    <!-- Main content -->
        <section class="content">
            <div class="row">
                <form role="form" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Post Sub Title</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ $post->subtitle }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Post Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $post->slug }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Tag</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                                style="width: 100%;" name="tags[]">
                                            @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                    @foreach($post->tags as $postTag)
                                                        @if($postTag->id == $tag->id)
                                                        selected
                                                        @endif
                                                    @endforeach
                                            >{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                                style="width: 100%;" name="categories[]">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                        @foreach($post->categories as $postCategory)
                                                        @if($postCategory->id == $category->id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">File input</label>
                                    <input type="file" name="image" id="image">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" value="1" @if($post->status == 1)
                                            {{ 'checked' }}
                                                @endif> Publish
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Write post body here
                                <small>Simple and fast</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                            <!-- /. tools -->

                        <!-- /.box-header -->
                        <div class="box-body pad">
                          <textarea name="body"
                                    style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{ $post->body }}</textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-success" href="{{ route('post.index') }}">Back</a>
                        </div>
                    </div>
                </div>
                </div>
                </form>
                <!-- /.col-->
            </div>

            <!-- ./row -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('footerSection')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script>
        $(document).ready(function () {
            $(".select2").select2();
        });
    </script>
@endsection
