@extends('layout.app')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <section class="content">
                <button class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></button>
                <!-- row -->
                <div class="row">

                    <div class="col-md-10">
                        <!-- The time line -->
                        <ul class="timeline">
                            <!-- timeline time label -->

                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <i class="fa fa-hand-o-right bg-blue"></i>


                                <div class="timeline-item">


                                    <h1 class="timeline-header"><B>ชื่อโครงงาน {{$project->name_project_th}}
                                            ({{$project->name_project_eng}})</B>


                                        @if($is_owner || ( isset(Auth::user()->role)  && Auth::user()->role == 'admin'))

                                            <a class="btn btn-primary btn-xs"
                                               href="/admin/project/{{$project->id}}/edit"> แก้ไข </a>
                                        @endif


                                            @if($is_owner|| ( isset(Auth::user()->role)  && Auth::user()->role == 'admin'))


                                            {{--<a class="btn btn-danger btn-xs"
                                               href="/admin/project/{{$project->id}}/delete"> ลบ </a>--}}

                                            <button  onclick="/*myFunction(),*/deleteBranch({{$project->id}})" type="button"
                                                     class="btn btn-danger">ลบ
                                            </button>

                                        @endif



                                    </h1>


                                    <div class="timeline-body">


                                        <div><img src="../../dist/img/molecule.png" class="img-circle" alt="User Image"><B>ประเภทโครงงาน </B>
                                            @if(isset($project->projectType->name))
                                                {{$project->projectType->name}}
                                            @endif
                                        </div>
                                        <div><img src="../../dist/img/mortarboard.png" class="img-circle"
                                                  alt="User Image"><B>ปีการศึกษาที่สอบผ่าน </B>
                                            @if(isset($project->projectYear))
                                                {{$project->projectYear->name}}
                                            @endif
                                        </div>
                                        <div><img src="../../dist/img/student.png" class="img-circle"
                                                  alt="User Image"><B>อาจารย์ที่ปรึกษา </B>
                                            @if(isset($project->advisors))
                                                @foreach($project->advisors as $advisor)
                                                    @if($advisor->status == \App\Models\ProjectAdvisor::STATUS_MAIN)
                                                        {{$advisor->advisorDetail->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div><img src="../../dist/img/student.png" class="img-circle"
                                                  alt="User Image"><B>คณะกรรมการ </B>
                                            @if(isset($project->advisors))
                                                @foreach($project->advisors as $advisor)
                                                    @if($advisor->status == \App\Models\ProjectAdvisor::STATUS_SUB)
                                                        {{$advisor->advisorDetail->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div><img src="../../dist/img/medal.png" class="img-circle" alt="User Image">
                                            <div class="panel box box-danger">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapseTwo" class="" aria-expanded="true">
                                                            รางวัลที่ได้รับ
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse in"
                                                     aria-expanded="true" style="">
                                                    <div class="box-body">
                                                        @if(isset($project->awards))
                                                            @foreach($project->awards as $award)
                                                                ชื่อราววัล {{$award->awardDetail->name_award}} <br>
                                                                ที่ {{$award->awardDetail->number}} <br>
                                                                ปี {{$award->awardDetail->year_award}}  <br>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </li>

                            <li>
                                <i class="fa fa-user bg-aqua"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header no-border"><B>สมาชิกโครงงาน (Project member)</B></h3>
                                    <div class="timeline-body">
                                        <ul>
                                            @if(isset($project->members))
                                                @foreach($project->members as $member)
                                                    <li>{{$member->memberDetail->name}}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-camera bg-purple"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><B>รูปโครงงาน( Project Image)</B></h3>

                                    <div class="timeline-body">
                                        <!-- Swiper -->
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                @if(isset($project->image))
                                                    @foreach($project->image as $image)
                                                        <div class="swiper-slide"
                                                             style="background-image:url('/images/uploads/{{$image->name_image}}')"></div>
                                                    @endforeach
                                                @endif

                                            </div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-sticky-note-o bg-yellow"></i>

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><B>บทคัดย่อโครงงาน (Project Abstract)</B></h3>

                                    <div class="timeline-body" style="height: 20vh;overflow-x: hidden;">

                                        <span>

                                            @if(isset($project->id_description))
                                                {{$project->id_description}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="timeline-footer">
                                        @if(isset(\Illuminate\Support\Facades\Auth::user()->id))

                                        <a class="btn btn-warning btn-flat btn-xs" href="{{$project->paths->path_doc}}"
                                           target="_blank">ดาวน์โหลดเอกสารโครงงาน</a>

                                       {{-- @if(isset(\Illuminate\Support\Facades\Auth::user()->id))--}}
                                            <a class="btn btn-warning btn-flat btn-xs"
                                               href="{{$project->paths->path_program}}" target="_blank">ดาวน์โหลดไฟล์โปรเจค</a>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                            </li>


                            <li><img src="../../dist/img/youtube.png" class="img-circle" alt="User Image">

                                <div class="timeline-item">

                                    <h3 class="timeline-header"><B>วีดีโอโครงงาน (Project vdo)</B></h3>

                                    <div class="timeline-body">
                                        <div class="embed-responsive embed-responsive-16by9" id="youtube_em"></div>
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                                <i class="fa  fa-calendar-minus-o   bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- /.row -->

            </section>

        </section>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        function deleteBranch(id) {
            if (confirm("Do you want to delete this branch?")) {
                var form = document.getElementById('deleteBranch');
                form.setAttribute('action', "/admin/project/" + id + "/delete")
                form.submit()
            }
        }

        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }


                @if (isset($project->paths->path_vdo))
        var myId = getId("{{$project->paths->path_vdo}}");

        if (myId !== 'error') {
            $('#youtube_em').html('<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
        }
                @endif


        var swiper = new Swiper('.swiper-container', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                },
            });
    </script>

    <style>
        .swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }
    </style>


    <script type="text/javascript">
        function deleteBranch(id) {
            if(confirm("คุณต้องการจะลบใช้หรือไม่?")){
                var form = document.getElementById('deleteBranch');
                form.setAttribute('action',"/admin/project/"+id+"/delete")
                form.submit()
            }
        }
    </script>
@endpush
