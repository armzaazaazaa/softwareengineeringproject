@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                แก้ไขรางวัล {{$branch->name}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="/admin/award">จัดการรางวัล</a></li>

                        </ol>
                        <div class="box-header with-border">
                            <h3 class="box-title">เพิ่ม</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/admin/award/{{$branch->id}}/edit">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อรางวัลา</label>

                                    <div class="col-sm-10">
                                        <input type="text"
                                               name="award[name_award]"
                                               value="{{$branch->name_award}}"
                                               class="form-control" placeholder="ชื่อสาขา">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ปีรางวัล</label>

                                    <div class="col-sm-10">
                                        <input type="text"
                                               name="award[year_award]"
                                               value="{{$branch->year_award}}"
                                               class="form-control" placeholder="ชื่อสาขา">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ที่รางวัล</label>

                                    <div class="col-sm-10">
                                        <input type="text"
                                               name="award[number]"
                                               value="{{$branch->number}}"
                                               class="form-control" placeholder="ชื่อสาขา">
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