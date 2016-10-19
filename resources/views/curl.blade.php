





























































<form action="/test-curl" method="post">
    <h3>Curl test In</h3>

    <div class="form-group">

        <label for = "email"><p2>Your E-Mail</p2></label>
        <input class="form-control" type="text" name="email" id="email" > </div>

    <div class="form-group">
        <label for = "password"><p2>Your Password</p2></label>
        <input class="form-control" type="text" name="password" id="password"> </div>
    <div>


        <button type="submit" class="btn btn-primary">Sign In</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </div>

</form>






































