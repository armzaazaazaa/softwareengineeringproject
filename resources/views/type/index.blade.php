@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Project Types Management
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="#">เพิ่มประเภทโครงงาน</a></li>

                        </ol>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <a href="/admin/type/create" class="btn btn-primary">
                                เพิ่มประเภทโครงงาน
                            </a>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ชื่อประเภทโครงงาน</th>
                                    <th>จำนวนโครงงาน</th>
                                    <th>การจัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project_types as $project_type)
                                    <tr>
                                        <td>{{$project_type->id}}</td>
                                        <td>{{$project_type->name}}</td>
                                        <td></td>
                                        <td>
                                            <a href="/admin/type/{{$project_type->id}}/edit" class="btn btn-success">แก้ไข</a>
                                            <button onclick="deleteBranch({{$project_type->id}})" type="button"
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
                form.setAttribute('action',"/admin/type/"+id+"/delete")
                form.submit()
            }
        }
    </script>
@endsection