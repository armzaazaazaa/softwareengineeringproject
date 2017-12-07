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
                    <li class="breadcrumb-item"><a href="#">แก้ไข</a></li>

                </ol>
                <div class="box-header with-border">
                    <h3 class="box-title">แก้ไขโครงงานทางวิศวกรรมซอฟต์แวร์</h3>

                    <form method="post" action="{{url("/admin/project/$project->id/edit")}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box box-primary">

                            <!-- /.box-header -->
                            <!-- form start -->


                            <div class="box-body">
                                <div class="form-group">
                                    <label>เลือกประเภทของโครงงาน</label>
                                    <select class="form-control" name="project_type_id" id="project_type_id">
                                        @foreach($project_type as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาไทย</label>
                                    <input required class="form-control" id="exampleInputEmail1"
                                           name="name_project_th"
                                           value="{{$project->name_project_th}}"
                                           placeholder="ภาษาไทย">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อโครงงาน ภาษาอังกฤษ</label>
                                    <input required class="form-control" id="exampleInputEmail1"
                                           name="name_project_eng"
                                           value="{{$project->name_project_eng}}"
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
                                    <select class="form-control" name="year" id="year">
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>อาจารย์ที่ปรึกษา</label>
                                    <select class="form-control" name="adviser_id" id="adviser_main">
                                        @foreach($adviser as $advisors)
                                            <option value="{{$advisors->id}}">{{$advisors->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>อาจารย์ที่ปรึกษารอง</label>
                                    <select class="form-control" id="advisers" name="advisers[]" multiple="multiple">
                                        @foreach($adviser as $advisors)
                                            <option value="{{$advisors->id}}">{{$advisors->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>รายละเอ็ยดโครงงาน</label>
                                    <textarea class="form-control" rows="3" name="id_description"
                                              placeholder="บทคัดย่อ...">{{$project->id_description}}</textarea>
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
                                           value="{{$project->paths->path_doc}}"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="path_program">URLเก็บโปรแกรม</label>
                                    <input required class="form-control" id="path_program"
                                           name="path_program"
                                           value="{{$project->paths->path_program}}"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="path_vdo">embed เก็บไฟล์VDOyouTube</label>
                                    <input required class="form-control" id="path_vdo"
                                           name="path_vdo"
                                           value="{{$project->paths->path_vdo}}"
                                           placeholder="เช่น <iframe width=560 height=315 src=https://www.youtube.com/embed/CevxZvSJLk8 frameborder=0 allowfullscreen></iframe>">
                                </div>


                                <div class="form-group image-upload">
                                    {{--------1--}}
                                    @if(count($project->image)  > 0)
                                        <input type="file" name="file[0]" id="profile-img0" value="/images/uploads/{{$project->image[1]->name_image}}">
                                        <img src="/images/uploads/{{$project->image[0]->name_image}}" class="img-up" id="profile-img-tag0" width="200px" />
                                        <input type="hidden" name="check_file[0]" value="{{$project->image[0]->name_image}}">
                                        @else
                                        <input type="file" name="file[0]" id="profile-img0" >
                                        <img src="" class="img-up" id="profile-img-tag0" width="200px" style="display:none" />
                                    @endif
                                    {{------------------2---------------}}

                                    @if(count($project->image) > 1)
                                        <input type="file" name="file[1]" id="profile-img1" value="/images/uploads/{{$project->image[1]->name_image}}">
                                        <img src="/images/uploads/{{$project->image[1]->name_image}}" class="img-up" id="profile-img-tag1" width="200px" />
                                        <input type="hidden" name="check_file[1]" value="{{$project->image[1]->name_image}}">
                                    @else
                                        @if(count($project->image)  == 1)
                                            <input type="file" name="file[1]" id="profile-img1">
                                        @else
                                            <input type="file" name="file[1]" id="profile-img1" style="display:none">
                                        @endif
                                        <img src="" class="img-up" id="profile-img-tag1" width="200px" style="display:none" />
                                    @endif
                                    {{------------------3---------------}}
                                    @if(count($project->image) > 2)
                                        <input type="file" name="file[2]" id="profile-img2" value="{{$project->image[2]->name_image}}" >
                                        <img src="/images/uploads/{{$project->image[2]->name_image}}" class="img-up" id="profile-img-tag2" width="200px" />
                                        <input type="hidden" name="check_file[2]" value="{{$project->image[2]->name_image}}">
                                    @else
                                        @if(count($project->image)  == 2)
                                            <input type="file" name="file[2]" id="profile-img2">
                                        @else
                                            <input type="file" name="file[2]" id="profile-img2" style="display:none">
                                        @endif
                                        <img src="" class="img-up" id="profile-img-tag2" width="200px" style="display:none" />
                                    @endif
                                    {{------------------4---------------}}
                                    @if(count($project->image) > 3)
                                        <input type="file" name="file[3]" id="profile-img3"  value="{{$project->image[3]->name_image}}">
                                        <img src="/images/uploads/{{$project->image[3]->name_image}}" class="img-up" id="profile-img-tag3" width="200px" />
                                        <input type="hidden" name="check_file[3]" value="{{$project->image[3]->name_image}}">
                                    @else
                                        @if(count($project->image)  == 3)
                                            <input type="file" name="file[3]" id="profile-img3">
                                        @else
                                            <input type="file" name="file[3]" id="profile-img3" style="display:none">
                                        @endif
                                        <img src="" class="img-up" id="profile-img-tag3" width="200px" style="display:none" />
                                    @endif
                                    {{------------------5---------------}}
                                    @if(count($project->image) > 4)
                                        <input type="file" name="file[4]" id="profile-img4" value="{{$project->image[4]->name_image}}">
                                        <img src="/images/uploads/{{$project->image[4]->name_image}}" class="img-up" id="profile-img-tag4" width="200px" />
                                        <input type="hidden" name="check_file[4]" value="{{$project->image[4]->name_image}}">
                                    @else
                                        @if(count($project->image)  == 4)
                                            <input type="file" name="file[4]" id="profile-img4">
                                        @else
                                            <input type="file" name="file[4]" id="profile-img4" style="display:none">
                                        @endif
                                        <img src="" class="img-up" id="profile-img-tag4" width="200px" style="display:none" />
                                    @endif

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

                $('#year').val("{{$project->year}}");
                $('#adviser_main').val({{$project_adviser_main}});
                $('#advisers').select2().val({{$project_adviser_sub}}).trigger("change");
                $('#awards').select2().val({{$project_award}}).trigger("change");
                $('#members').select2()
                    .prop("disabled", true)
                    .val({{$project_user}}).trigger("change");

                @if (isset($project->project_type_id))
                $('#project_type_id').val("{{ $project->project_type_id }}");

                @endif

            });

            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url = window.location.hostname === 'blueimp.github.io' ?
                    '//jquery-file-upload.appspot.com/' : 'server/php/',
                    uploadButton = $('<button/>')
                        .addClass('btn btn-primary')
                        .prop('disabled', true)
                        .text('Processing...')
                        .on('click', function () {
                            var $this = $(this),
                                data = $this.data();
                            $this
                                .off('click')
                                .text('Abort')
                                .on('click', function () {
                                    $this.remove();
                                    data.abort();
                                });
                            data.submit().always(function () {
                                $this.remove();
                            });
                        });

                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    autoUpload: false,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    maxFileSize: 999000,
                    // Enable image resizing, except for Android and Opera,
                    // which actually support image resizing, but fail to
                    // send Blob objects via XHR requests:
                    disableImageResize: /Android(?!.*Chrome)|Opera/
                        .test(window.navigator.userAgent),
                    previewMaxWidth: 100,
                    previewMaxHeight: 100,
                    previewCrop: true
                }).on('fileuploadadd', function (e, data) {
                    data.context = $('<div/>').appendTo('#files');
                    $.each(data.files, function (index, file) {
                        var node = $('<p/>')
                            .append($('<span/>').text(file.name));
                        node.appendTo(data.context);
                    });
                }).on('fileuploadprocessalways', function (e, data) {
                    var index = data.index,
                        file = data.files[index],
                        node = $(data.context.children()[index]);
                    if (file.preview) {
                        node
                            .prepend('<br>')
                            .prepend(file.preview)
                            .prepend("<input type='hidden' name='filesCheck[]' value=' " + file + "' ");
                    }
                    if (file.error) {
                        node
                            .append('<br>')
                            .append($('<span class="text-danger"/>').text(file.error));
                    }
                    if (index + 1 === data.files.length) {
                        data.context.find('button')
                            .text('Upload')
                            .prop('disabled', !!data.files.error);
                    }
                }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            });
        </script>
    @endpush
@endsection
