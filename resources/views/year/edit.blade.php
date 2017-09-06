@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                แก้ไขปีการศึกษา {{$branch->name}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="/admin/year">จัดการปีการศึกษา</a></li>

                        </ol>
                        <div class="box-header with-border">
                            <h3 class="box-title">แก้ไขปีการศึกษา</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/admin/year/{{$branch->id}}/edit">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ปีการศึกษา</label>

                                    <div class="col-sm-10">
                                        <input type="text"
                                               name="year[name]"
                                               value="{{$branch->name}}"
                                               class="form-control" placeholder="ชื่อสาขา">
                                    </div>
                                </div>


                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">ตกลง</button>
                                    <button type="submit" class="btn btn-default">ยกเลิก</button>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </form>
                    </div>


                </div>
            </div>
    </div>
    </section>
    <!-- /.content -->
    </div>

@endsection

@section('javascript')
@endsection