<x-layout>
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="register">
                <h1>{{ $heading }}</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form method="POST" action="/registeruser">
                            @csrf
                            <div class="box_form">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @error('check_2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Your name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Your email address" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password1" name="password"
                                        placeholder="Your password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" id="password2"
                                        name="password_confirmation" placeholder="Confirm password">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <div class="form-group text-center add_top_30">
                                    <input class="btn_1" type="submit" value="Submit">
                                </div>
                            </div>
                            <p class="text-center"><small>
                                    Already have an acccount?
                                    <a href="/login">Sign In</a>
                                </small></p>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /register -->
        </div>
    </div>
</x-layout>
