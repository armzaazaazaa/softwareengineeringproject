@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        </section>


        <section class="content">

            <!-- Default box -->
            <div class="box">


                <!-- /.box-body -->
                <div class="box-footer">


                    <ul class="timeline">
                        <!-- timeline time label -->
                        <li class="time-label">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                                <li class="breadcrumb-item"><a href="#">{{$show->name_project_eng}}</a></li>

                            </ol>
                            <span class="bg-red">
                      {{$show->name_project_th}}</br>
                                {{$show->name_project_eng}}

                  </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa  fa-child bg-aqua"></i>

                            <div class="timeline-item">


                                <h3 class="timeline-header no-border"><a href="#">ผู้จัดทำโครงงาน</a></h3>
                                <p> นาย ........... </p>
                                <p> นาย ............ </p>
                            </div>
                            <div class="timeline-item">


                                <h3 class="timeline-header no-border"><a href="#">อาจารย์ที่ปรึกษา</a></h3>
                                <p> อาจารย์........... </p>
                                <p> อาจารย์........... </p>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa  fa-file-text-o bg-yellow"></i>

                            <div class="timeline-item">


                                <h3 class="timeline-header"><a href="#">รายละเอียด โครงงานทางวิศวกรรมซอฟต์แวร์</a>
                                </h3>

                                <div class="timeline-body">
                                    {{$show->id_description}}
                                </div>
                                <div class="timeline-footer">

                                </div>
                            </div>
                        </li>
                        <li>
                            <i class="fa  fa-file-text-o bg-yellow"></i>

                            <div class="timeline-item">


                                <h3 class="timeline-header"><a href="#">รางวัลที่ได้รับ</a>
                                </h3>

                                <div class="timeline-body">
                                    {{$show->name_award}}
                                </div>
                                <div class="timeline-footer">

                                </div>
                            </div>
                        </li>


                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">

                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-camera bg-purple"></i>

                            <div class="timeline-item">


                                <h3 class="timeline-header"><a href="#">ภาพตัวอย่าง โครงงานทางวิศวกรรมซอฟต์แวร</a>
                                </h3>

                                <div class="timeline-body">

                                    <img src="/images/uploads/{{$show->name_image}}" alt="..." class="margin"
                                         style="height: 200px">

                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-video-camera bg-maroon"></i>

                            <div class="timeline-item">


                                <h3 class="timeline-header"><a href="#">วีดีโอ โครงงานทางวิศวกรรมซอฟต์แวร</a>

                                    <div class="timeline-body">

                                        <div class="embed-responsive embed-responsive-16by9">
                                            {{$show->path_vdo}}
                                            {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/BaWaRAQ4l-g" frameborder="0" allowfullscreen></iframe>--}}
                                        </div>
                                    </div>
                                    <div class="timeline-footer">


                                    </div>

                                    {{--Start Modu1--}}

                                    <div class="container">
                                        </br>
                                        <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-info btn" data-toggle="modal"
                                                data-target="#myModal">ดาวโหลดเโปรแกรม
                                        </button>

                                        <!-- Modal -->

                                    </div>

                                    {{--END modu1--}}


                                    <div class="container">
                                        </br></br>
                                        <!-- Trigger the modal with a button -->
                                        <button type="button" class="btn btn-info btn" data-toggle="modal"
                                                data-target="#myModal">ดาวโหลดเอกสาร
                                        </button>

                                        <!-- Modal -->

                                    </div> </br></br> </br></br>
                                    <a href="/Manage_project/edit/{{$showid}}">
                                        <button type="button" class="btn btn-info btn-warning" data-toggle="modal"
                                                data-target="#myModal">แก้ไข
                                        </button>
                                    </a>

                                    <a href="/Manage_project/delete/{{$showid}}">

                                        <button type="button" class="btn btn-info btn-danger" data-toggle="modal"
                                                data-target="#myModal">ลบ
                                        </button>
                                    </a>




                        </li>


                        <!-- END timeline item -->
                        <li>


                            <i class="fa fa-registered"></i>
                        </li>
                    </ul>

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->


            <section class="content">
            </section>
    </div>


@endsection

@section('javascript')
    <script type="text/javascript">
        function deleteBranch(id) {
            if(confirm("Do you want to delete this branch?")){
                var form = document.getElementById('deleteBranch');
                form.setAttribute('action',"/admin/project/"+id+"/delete")
                form.submit()
            }
        }
    </script>
@endsection