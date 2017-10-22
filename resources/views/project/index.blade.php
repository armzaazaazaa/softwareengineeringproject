@extends('layout.app')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <section class="content">

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


                                    <h3 class="timeline-header"><B>ชื่อโครงงาน Project name</B></h3>

                                    <div class="timeline-body">

                                        <div><B>ประเภทโครงงาน </B> 213</div>
                                        <div><B>ปีการศึกษาที่สอบผ่าน </B> 213</div>
                                        <div><B>ปีการศึกษาที่สอบผ่าน </B> 213</div>
                                        <div><B>อาจารย์ที่ปรึกษา </B> 213</div>
                                        <div><B>รางวัลที่ได้รับ </B> 213</div>


                                    </div>

                                </div>
                            </li>

                            <li>
                                <i class="fa fa-user bg-aqua"></i>

                                <div class="timeline-item">


                                    <h3 class="timeline-header no-border"><B>สมาชิกโครงงาน Project member</B></h3>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-camera bg-purple"></i>

                                <div class="timeline-item">


                                    <h3 class="timeline-header"><B>รูปโครงงาน Project Image</B></h3>

                                    <div class="timeline-body">
                                        <!-- Swiper -->
                                        <div class="swiper-container">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/1)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/2)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/3)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/4)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/5)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/6)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/7)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/8)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/9)"></div>
                                                <div class="swiper-slide"
                                                     style="background-image:url(http://lorempixel.com/600/600/nature/10)"></div>
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

                                    <h3 class="timeline-header"><B>บทคัดย่อโครงงาน Project Abstract</B></h3>

                                    <div class="timeline-body">
                                        Take me to your leader!
                                        Switzerland is small and neutral!
                                        We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">

                                            <a class="btn btn-warning btn-flat btn-xs">ดาวน์โหลดเอกสารโครงงาน</a>
                                        @if(isset(\Illuminate\Support\Facades\Auth::user()->id))
                                            <a class="btn btn-warning btn-flat btn-xs">ดาวน์โหลดไฟล์โปรเจค</a>
                                        @endif

                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                            </li>

                            <li>
                                <i class="fa fa-video-camera bg-maroon"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><B>วีดีโอโครงงาน Project vdo</B></h3>

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

        var myId = getId("{{$url}}");

        if (myId !== 'error') {
            $('#youtube_em').html('<iframe class="embed-responsive-item" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
        }

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
@endpush
