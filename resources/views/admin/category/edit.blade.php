@extends('admin.layouts.app')

@section('main-content')

    <div class="content-wrapper">

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Titles</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        @include('layouts.message')

                        <form role="form" action="{{ route('category.update', $category->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Tag Title</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Tag Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection