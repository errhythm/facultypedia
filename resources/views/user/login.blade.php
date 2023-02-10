<x-layout>
<div class="bg_color_2">
    <div class="container margin_60_35">
        <div id="login">
            <h1>Please login to Findoctor!</h1>
            <div class="box_form">
                <form method="POST" action="/loginuser">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your email address" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your password" id="password" name="password">
                    </div>
                    <a href="#0"><small>Forgot password?</small></a>
                    <div class="form-group text-center add_top_20">
                        <input class="btn_1 medium" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <p class="text-center link_bright">Do not have an account yet? <a href="#0"><strong>Register now!</strong></a></p>
        </div>
        <!-- /login -->
    </div>
</div>
</x-layout>
