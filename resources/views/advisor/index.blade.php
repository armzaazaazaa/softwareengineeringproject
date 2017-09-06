@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                อาจารย์ที่ปรึกษา
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="#">จัดการอาจารย์ที่ปรึกษา</a></li>

                        </ol>
                        <div class="box-header">
                            <h3 class="box-title">จัดการอาจารย์ที่ปรึกษา</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <a href="/admin/advisor/create" class="btn btn-primary">
                                เพิ่มอาจารย์ที่ปรึกษา
                            </a>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ชื่ออาจารย์ที่ปรึกษา</th>

                                    <th>จำนวนโครงงาน</th>
                                    <th>การจัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($advisor as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/advisor/{{$data->id}}/edit" class="btn btn-success">แก้ไข</a>
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
            if(confirm("Do you want to delete this branch?")){
                var form = document.getElementById('deleteBranch');
                form.setAttribute('action',"/admin/branch/"+id+"/delete")
                form.submit()
            }
        }
    </script>
@endsection