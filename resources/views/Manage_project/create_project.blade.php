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



            <section class="content">


                <!-- Default box -->
                <div class="box">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                        <li class="breadcrumb-item"><a href="#">เพิ่มโครงงาน</a></li>

                    </ol>
                    <div class="box-header with-border">
                        <h3 class="box-title">เพิ่มโครงงานทางวิศวกรรมซอฟต์แวร์</h3>

                        <form method="post" action="/savecreate" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="box box-primary">

                                <!-- /.box-header -->
                                <!-- form start -->


                                <div class="box-body">
                                    <div class="form-group">
                                        <label>เลือกประเภทของโครงงาน</label>
                                        <select class="form-control" name="projecttype">
                                            <option value="1">web Application</option>
                                            <option value="2">Mobile Application</option>
                                            <option value="3">Other projects</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาไทย</label>
                                        <input class="form-control" id="exampleInputEmail1"
                                               name="project_name_th"
                                               placeholder="ภาษาไทย">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาอังกฤษ</label>
                                        <input class="form-control" id="exampleInputEmail1"
                                               name="project_name_eng"
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
                                        <select class="form-control" name="projecttype">
                                            <option value="1">web Application</option>
                                            <option value="2">Mobile Application</option>
                                            <option value="3">Other projects</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>อาจารย์ที่ปรึกษา</label>
                                        <select class="form-control" name="projecttype">
                                            <option value="1">web Application</option>
                                            <option value="2">Mobile Application</option>
                                            <option value="3">Other projects</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>รายละเอ็ยดโครงงาน</label>
                                        <textarea class="form-control" rows="3" name="abstracts"
                                                  placeholder="บทคัดย่อ..."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ได้รับรางวัล</label>
                                        <select class="form-control" name="projecttype">
                                            <option value="1">web Application</option>
                                            <option value="2">Mobile Application</option>
                                            <option value="3">Other projects</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ปีที่ได้รับราวัล</label>
                                        <select class="form-control" name="projecttype">
                                            <option value="1">web Application</option>
                                            <option value="2">Mobile Application</option>
                                            <option value="3">Other projects</option>
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
                        </form>


                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">



                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->


                <section class="content">
                </section>
    </div>



@endsection
