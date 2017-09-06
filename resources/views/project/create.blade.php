{{--
 * Created by PhpStorm.
 * User: MI6
 * Date: 27/3/2560
 * Time: 22:20
 --}}
@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


        </section>


        <section class="content">
            <!-- Default box -->
            <div class="box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="#">เพิ่มโครงงาน</a></li>

                </ol>
                <div class="box-header with-border">
                    <h3 class="box-title">เพิ่มโครงงานทางวิศวกรรมซอฟต์แวร์</h3>

                    <form method="post" action="{{url('/admin/project/save')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box box-primary">

                            <!-- /.box-header -->
                            <!-- form start -->


                            <div class="box-body">
                                <div class="form-group">
                                    <label>เลือกประเภทของโครงงาน</label>
                                    <select class="form-control" name="project_type_id">
                                        @foreach($project_type as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาไทย</label>
                                    <input class="form-control" id="exampleInputEmail1"
                                           name="name_project_th"
                                           placeholder="ภาษาไทย">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาอังกฤษ</label>
                                    <input class="form-control" id="exampleInputEmail1"
                                           name="name_project_eng"
                                           placeholder="ภาษาอังกฤษ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อผู้จัดทำ </label>
                                    <input class="form-control" id="exampleInputEmail1"
                                           name="author_name"
                                           placeholder="ชื่อผู้จัดทำ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ปีการศึกษาที่สอบผ่านโปรเจค</label>
                                    <select class="form-control" name="year">
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>อาจารย์ที่ปรึกษา</label>
                                    <select class="form-control" name="adviser_id">
                                        @foreach($adviser as $advisors)
                                            <option value="{{$advisors->id}}">{{$advisors->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>รายละเอ็ยดโครงงาน</label>
                                    <textarea class="form-control" rows="3" name="id_description"
                                              placeholder="บทคัดย่อ..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">ได้รับรางวัล</label>
                                    <select class="form-control" name="award_id">
                                        @foreach($awards as $award)
                                            <option value="{{$award->id}}">{{$award->name_award}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ปีที่ได้รับราวัล</label>
                                    <select class="form-control" name="year_award">
                                        @foreach($awards as $award)
                                            <option value="{{$award->id}}">{{$award->year_award}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">URLเก็บเอกสาร</label>
                                    <input class="form-control" id="exampleInputPassword1"
                                           name="document_archive_url"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">URLเก็บโปรแกรม</label>
                                    <input class="form-control" id="exampleInputPassword1"
                                           name="url_archive_program"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">embed เก็บไฟล์VDOyouTube</label>
                                    <input class="form-control" id="exampleInputPassword1"
                                           name="embed_youTube"
                                           placeholder="เช่น <iframe width=560 height=315 src=https://www.youtube.com/embed/CevxZvSJLk8 frameborder=0 allowfullscreen></iframe>">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile">รูปภาพตัวอยางโครงงาน</label>

                                    <input type="file" id="exampleInputFile" name="image1">


                                    {{--<div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Check me out
                                        </label>
                                    </div>--}}


                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </section>
    </div>


@endsection
