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
                                    <label for="exampleInputPassword1">URLเก็บเอกสาร</label>
                                    <input required class="form-control" id="exampleInputPassword1"
                                           name="document_archive_url"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">URLเก็บโปรแกรม</label>
                                    <input required class="form-control" id="exampleInputPassword1"
                                           name="url_archive_program"
                                           placeholder="เช่น https://drive.google.com/file/....">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">embed เก็บไฟล์VDOyouTube</label>
                                    <input required class="form-control" id="exampleInputPassword1"
                                           name="embed_youTube"
                                           placeholder="เช่น <iframe width=560 height=315 src=https://www.youtube.com/embed/CevxZvSJLk8 frameborder=0 allowfullscreen></iframe>">
                                </div>


                                <div class="form-group">
                                    <label for="fileupload">รูปภาพตัวอยางโครงงาน</label>

                                    <input id="img" type="file" name="img">
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Add files...</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input id="fileupload" type="file" name="files[]" multiple>
                                    </span>
                                    <!-- The container for the uploaded files -->
                                    <div id="files" class="files"></div>

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


    @push('scripts')
    <script>
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

        $(document).ready(function () {
            $('#advisers').select2();
            $('#awards').select2();
            $('#members').select2({
                maximumSelectionLength: 3
            });
        });
    </script>
    @endpush
@endsection
