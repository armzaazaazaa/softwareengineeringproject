{{--

/**
 * Created by PhpStorm.
 * User: MI6
 * Date: 27/3/2560
 * Time: 22:28
 */--}}

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-ict-login">
            <div class="panel-heading">เข้าสู่ระบบ BoardHub</div>
            <div class="panel-body">
                <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">บัญชีผู้ใช้มหาวิทยาลัยพะเยา</label>


                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">รหัสผ่าน</label>


                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            เข้าสู่ระบบ
                        </button>



                    </div>


                </form>
            </div>
        </div>
    </div>
</div>