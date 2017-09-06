{{--
/**
 * Created by PhpStorm.
 * User: MI6
 * Date: 27/3/2560
 * Time: 22:22
 */--}}
@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <section class="content">

            <section class="content">

                <div class="box-footer">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/Index/home" class="logo">กลับไปหน้าหลัก</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>

                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">แก้ไขโครงงาน</h3>

                            <form method="post" action="/editproject/{{$showid}}">
                                {{ csrf_field() }}
                                <div class="box box-primary">

                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form role="form">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาไทย</label>
                                                <input class="form-control" id="exampleInputEmail1"
                                                       placeholder="ภาษาอังกฤษ" value="{{$show->name_project_th}}"
                                                       name="name_th">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาอังกฤษ</label>
                                                <input class="form-control" id="exampleInputEmail1"
                                                       placeholder="ภาษาอังกฤษ" value="{{$show->name_project_eng}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ชื่อผู้จัดทำ</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                       placeholder="ชื่อผู้จัดทำ">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">อาจารย์ที่ปรึกษา</label>
                                                <select class="form-control" name="projecttype">
                                                    <option value="1">web Application</option>
                                                    <option value="2">Mobile Application</option>
                                                    <option value="3">Other projects</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ปีการศึกษาที่จบ</label>
                                                <select class="form-control" name="projecttype">
                                                    <option value="1">web Application</option>
                                                    <option value="2">Mobile Application</option>
                                                    <option value="3">Other projects</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">รางวัลที่ได้รับ</label>
                                                <select class="form-control" name="projecttype">
                                                    <option value="1">web Application</option>
                                                    <option value="2">Mobile Application</option>
                                                    <option value="3">Other projects</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>รายละเอ็ยดโครงงาน</label>
                                                <textarea class="form-control" rows="3"
                                                          placeholder="บทคัดย่อ...">{{$show->id_description}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">URLเก็บเอกสาร</label>
                                                <input class="form-control" id="exampleInputPassword1"
                                                       value="{{$show->path_doc}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">URLเก็บโปรแกรม</label>
                                                <input class="form-control" id="exampleInputPassword1"
                                                       value="{{$show->path_program}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">embed เก็บไฟล์VDOyouTube</label>
                                                <input class="form-control" id="exampleInputPassword1"
                                                       placeholder="เช่น <iframe width=560 height=315 src=https://www.youtube.com/embed/CevxZvSJLk8 frameborder=0 allowfullscreen></iframe>"

                                            </div>



                                            <div class="form-group">
                                                <label>เลือกชนิตของโครงงาน</label>
                                                <select class="form-control" >
                                                    <option>web Application</option>
                                                    <option>Moblie Application</option>
                                                    <option>Interactive</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">รูปภาพตัวอยางโครงงาน</label>
                                                <input type="file" id="exampleInputFile">

                                            </div>

                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>

                        <!-- /.box-footer-->
                    </div>

                </div>
                <!-- /.box-footer-->
    </div>
    <!-- /.box -->


    <section class="content">
    </section>
    </div>

@endsection
