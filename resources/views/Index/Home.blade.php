{{--

/**
 * Created by PhpStorm.
 * User: MI6
 * Date: 27/3/2560
 * Time: 22:25
 */--}}
@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <section class="content">
            {{--  <h3 class="box-title">โครงงานทางวิศวกรรมซอฟต์แวร์ มหาวิทยาลัยพะเยา</h3>--}}
            <p align="center"><img class="img-responsive pad" src="{{url('dist/img/logoo.png')}}" alt="Photo"></p>

            <form method="post" action="//{{$projectHome}}">

                <div class="row">
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa  fa-code"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">จำนวนโครงงานนิสิต</span>
                                <span class="info-box-number">{{$countProject}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-trophy"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">จำนวนโครงงานที่ได้รับรางวัล</span>
                                <span class="info-box-number">{{$countAwards}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <!-- /.col -->

                    <!-- /.col -->
                </div>
            </form>

            <section class="content">

                <!-- Default box -->
                {{-- <div class="box ">--}}
                <form action="/Index/home/search" method="post">
                    {{ csrf_field() }}
                    <div class="box " style="background:#ddd">
                        <div class="box-header with-border">
                            ค้นหา

                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>ประเภทโครงงาน</label>
                                    <select class="form-control" name="projecttype" id="projecttype">
                                        <option value="-1">All</option>
                                        @foreach($project_type as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>รางวัลโครงงาน</label>
                                    <select class="form-control" name="award" id="award">
                                        <option value="-1">All</option>
                                        @foreach($awards as $award)
                                            <option value="{{$award->id}}">{{$award->name_award}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>ปีการศึกษา</label>
                                    <select class="form-control" name="year" id="year">
                                        <option value="-1">All</option>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>อาจารย์ที่ปรึกษา</label>
                                    <select class="form-control" name="adviser_id" id="adviser">
                                        <option value="-1">All</option>
                                        @foreach($adviser as $advisors)
                                            <option value="{{$advisors->id}}">{{$advisors->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>ชื่อโครงงาน</label>
                                    <select class="form-control" name="projects" id="projects">
                                        <option value="-1">All</option>
                                        @foreach($projectAll as $project)
                                            <option value="{{$project->id}}">{{$project->name_project_th}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1 col-sm-2 col-xs-1">
                                <label></label>
                                <button type="submit" class="btn btn-warning" style="background:#00a65a">
                                    <i class="fa  fa-search"></i> ค้นหา
                                </button>

                            </div>
                        </div>
                    </div>
                </form>

            {{--   /////////////////////////////////////////////////////--}}
            <!-- /.box-body -->


                <div class="box-footer">
                    <div class="row">
                        @foreach($projectHome as $data )

                            {{--php--}}

                            <div class="col-md-4">
                                <a href="/admin/project/{{$data->id}}">
                                    <div class="box box-widget widget-user">
                                        <div class="widget-user-header bg-aqua-active">

                                            {{--style="background: url('../dist/img/photo1.png') center center;">--}}
                                            <h3 class="direct-text">{{$data->name_project_th}}</h3>
                                            <h5 class="description-text">{{$data->name_project_eng}}</h5>
                                        </div>
                                        <div class="widget-user-image">
                                            <img class="img-circle"
                                                 src="/images/uploads/{{$data->image[0]['name_image']}}"
                                                 alt="User Avatar">
                                        </div>
                                        <div class="box-footer">
                                            <div class="row">
                                                <div class="col-sm-6 border-right">
                                                    <div class="description-block">
                                                        <h5 class="description-header">ปี</h5>
                                                        <span class="description-text">{{$data->year}}</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="description-block">
                                                        <h5 class="description-header">ประเภท</h5>
                                                        <span class="description-text">{{$data->projectType['name']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                            </div>






                            {{--//////////////////////////////////////////////////////////////////////////////--}}



                        @endforeach

                        {{--   กรอบแสดงgit--}}

                        {{--   กรอบแสดงgit--}}
                    </div>
                    {{--    ////////////////////////////////////////--}}

                </div>


                <section class="content">
                </section>
            </section>
        </section>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#adviser').select2();
                $('#year').select2();
                $('#award').select2();
                $('#projecttype').select2();
                $('#projects').select2();


            });
        </script>
    @endpush

@endsection
