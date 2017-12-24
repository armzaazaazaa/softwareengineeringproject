@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                เพิ่มปีการศึกษา
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                                <li class="breadcrumb-item"><a href="/admin/year">กลับไปหน้าจัดการปีการศึกษา</a></li>

                            </ol>
                            <h3 class="box-title">เพิ่ม</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/admin/year/create">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ปีการศึกษา</label>

                                    <div class="col-sm-10">
                                        <input required type="text"
                                               name="year[name]"
                                               value=""
                                               class="form-control" placeholder="ปีการศึกษา">
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">ตกลง</button>
                                    <button type="submit" class="btn btn-default">ยกเลิก</button>

                                </div>
                                <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('javascript')
@endsection