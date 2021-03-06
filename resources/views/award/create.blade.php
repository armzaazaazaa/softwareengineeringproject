@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                เพิ่มรางวัล
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="/admin/award">กลับไปหน้าจัดการรางวัล</a></li>

                        </ol>
                        <div class="box-header with-border">
                            <h3 class="box-title">เพิ่ม</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="/admin/award/create">
                            <div class="box-body">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ชื่อรางวัล</label>

                                    <div class="col-sm-10">
                                        <input required type="text"
                                               name="award[name_award]"
                                               value=""
                                               class="form-control" placeholder="ชื่อรางวัล">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ปีรางวัล</label>

                                    <div class="col-sm-10">
                                        <input required type="text"
                                               name="award[year_award]"
                                               value=""
                                               class="form-control" placeholder="ปีรางวัล">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ที่รางวัล</label>

                                    <div class="col-sm-10">
                                        <input required type="text"
                                               name="award[number]"
                                               value=""
                                               class="form-control" placeholder="ที่รางวัล">
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">

                                    <button type="submit" class="btn btn-info">ตกลง</button>
                                    <button href="/Index/home" class="btn btn-default">ยกเลิก</button>

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