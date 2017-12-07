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
                                    <input required class="form-control" id="exampleInputEmail1"
                                           name="name_project_th"
                                           placeholder="ภาษาไทย">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาอังกฤษ</label>
                                    <input required class="form-control" id="exampleInputEmail1"
                                           name="name_project_eng"
                                           placeholder="ภาษาอังกฤษ">
                                </div>
                                <div class="form-group">
                                    <label for="author_name_1">ชื่อผู้จัดทำ </label>
                                    <select class="form-control" id="members" name="member[]" multiple="multiple">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}} ({{$user->username }})
                                            </option>
                                        @endforeach
                                    </select>
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
                                    <label>คณะกรรมการ</label>
                                    <select class="form-control" id="advisers" name="advisers[]" multiple="multiple">
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
                                    <label for="awards">ได้รับรางวัล</label>
                                    <select class="form-control" id="awards" name="awards[]" multiple="multiple">
                                        @foreach($awards as $award)
                                            <option value="{{$award->id}}">{{$award->name_award}}
                                                ลำดับ:{{$award->number}} ปีที่ได้รับราวัล
                                                :{{$award->year_award}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="path_doc">URLเก็บเอกสาร</label>
                                    <input required class="form-control" id="path_doc"
                                           name="path_doc"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="path_program">URLเก็บโปรแกรม</label>
                                    <input required class="form-control" id="path_program"
                                           name="path_program"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="path_vdo">embed เก็บไฟล์VDOyouTube</label>
                                    <input required class="form-control" id="path_vdo"
                                           name="path_vdo"
                                           placeholder="เช่น <iframe width=560 height=315 src=https://www.youtube.com/embed/CevxZvSJLk8 frameborder=0 allowfullscreen></iframe>">
                                </div>


                                <div class="form-group image-upload">
                                    <input type="file" name="file[]" id="profile-img0">
                                    <img src="" class="img-up" id="profile-img-tag0" width="200px" style="display:none" />

                                    <input type="file" name="file[]" id="profile-img1" style="display:none">
                                    <img src="" class="img-up" id="profile-img-tag1" width="200px" style="display:none" />

                                    <input type="file" name="file[]" id="profile-img2" style="display:none">
                                    <img src="" class="img-up" id="profile-img-tag2" width="200px" style="display:none" />

                                    <input type="file" name="file[]" id="profile-img3" style="display:none">
                                    <img src="" class="img-up" id="profile-img-tag3" width="200px" style="display:none" />

                                    <input type="file" name="file[]" id="profile-img4" style="display:none">
                                    <img src="" class="img-up" id="profile-img-tag4" width="200px" style="display:none" />
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


    @push('scripts')

        <style>
            .img-up {
                margin-bottom: 10px;
            }
        </style>
        <script type="text/javascript">

            $(document).ready(function () {

                function readURL(input,index) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#profile-img-tag'+index).css('display', "block");
                            $('#profile-img-tag'+index).attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);

                        var new_index = index + 1;
                        if (new_index < 5) {
                            $('#profile-img'+new_index).css('display', "block");
                            $('#profile-img-tag'+new_index).css('display', "block");
                        }

                    }
                }

                $('#profile-img0').change(function(){
                    readURL(this,0);
                });

                $('#profile-img1').change(function(){
                    readURL(this,1);
                });

                $('#profile-img2').change(function(){
                    readURL(this,2);
                });

                $('#profile-img3').change(function(){
                    readURL(this,3);
                });

                $('#profile-img4').change(function(){
                    readURL(this,4);
                });


                $('#advisers').select2();
                $('#awards').select2();
                $('#members').select2({
                    maximumSelectionLength: 3
                });
            });
        </script>
    @endpush
@endsection
