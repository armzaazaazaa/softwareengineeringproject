@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                รางวัล
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="row">

                    <div class="col-md-12">

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                            <li class="breadcrumb-item"><a href="/admin/award">จัดการรางวัล</a></li>

                        </ol>
                        <div class="box-header">
                            <h3 class="box-title">จัดการรางวัล</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <a href="/admin/award/create" class="btn btn-primary">
                                เพิ่มรางวัล
                            </a>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ชื่อรางวัล</th>
                                    <th>ปีรางวัล</th>
                                    <th>ลำดับรางวัล</th>
                                    <th>โครงงานที่ได้รับรางวัล</th>


                                    <th>การจัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($awards as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name_award}}</td>
                                        <td>{{$data->year_award}}</td>
                                        <td>{{$data->number}}</td>
                                        <td> <a href="/admin/project/{{$data->project_id}}">{{$data->name_project_th}} </a> </td>
                                        <td>
                                            <a href="/admin/award/{{$data->id}}/edit" class="btn btn-success">แก้ไข</a>
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
            if (confirm("Do you want to delete this branch?")) {
                var form = document.getElementById('deleteBranch');
                form.setAttribute('action', "/admin/award/" + id + "/delete")
                form.submit()
            }
        }
    </script>
@endsection