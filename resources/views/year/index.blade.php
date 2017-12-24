@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ปีการศึกษา
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="/admin/year">จัดการปีการศึกษา</a></li>

                        </ol>
                        <div class="box-header">
                            <h3 class="box-title">จัดการปีการศึกษา</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <a href="/admin/year/create" class="btn btn-primary">
                                เพิ่มปีการศึกษา
                            </a>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ปีการศึกษา</th>

                                    <th>จำนวนโครงงาน</th>
                                    <th>การจัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($years as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/year/{{$data->id}}/edit" class="btn btn-success">แก้ไข</a>
                                            <button onclick="deleteBranch({{$data->id}})" type="button"
                                                    class="btn btn-danger">ลบ
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form id="deleteBranch" method="post">
                                {{csrf_field()}}
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        function deleteBranch(id) {
            if(confirm("คุณต้องการจะลบใช้หรือไม่?")){
                var form = document.getElementById('deleteBranch');
                form.setAttribute('action',"/admin/year/"+id+"/delete")
                form.submit()
            }
        }
    </script>
@endsection