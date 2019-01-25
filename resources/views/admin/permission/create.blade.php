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

                        <form role="form" action="{{ route('permission.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Permission name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Permission">
                                </div>
                                <div class="form-group">
                                    <label for="name">Permission for</label>
                                    <select name="for" id="for" class="form-control">
                                        <option selected disabled>Select permission</option>
                                        <option value="user">User</option>
                                        <option value="post">Post</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('permission.index') }}" class="btn btn-danger">Back</a>
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