<h1> TODO create </h1>




<form action="/todo/create" method="post">
    {{csrf_field()}}  {{--มีฟรอมต้องพิมต่อ--}}
    First name:<input type="text" name="firstname" value="Mickey"><br>
    Last name:<input type="text" name="lastname" value="Mouse"><br>
    Tel : <input type="text" name="Tel[]"><br>
    Tel : <input type="text" name="Tel[]"><br>
    Tel : <input type="text" name="Tel[]"><br>
    Tel : <input type="text" name="Tel[]"><br>
    Tel : <input type="text" name="Tel[]"><br>
    Tel : <input type="text" name="Tel[]"><br><br>
    <input type="submit" value="Submit">
</form>


