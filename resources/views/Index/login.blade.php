{{--

/**
 * Created by PhpStorm.
 * User: MI6
 * Date: 27/3/2560
 * Time: 22:28
 */--}}
<form class="form-horizontal" method="post" action="/login">
    {{csrf_field()}}
    <div class="box-body">
        <div class="form-group">



        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">อีเมล</label>

            <div class="col-sm-10">
                <input type="email" name="user[email]" class="form-control" id="inputEmail3"
                       placeholder="อีเมล">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">รหัสผ่าน</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" name="user[password]" id="inputPassword3"
                       placeholder="รหัสผ่าน">
            </div>
        </div>


    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-info ">login</button>


    </div>
    <!-- /.box-footer -->
</form>