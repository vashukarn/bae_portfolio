<x-app-layout>
    @section('page_title', 'Login')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to {{ getBusinessSetting('app_name') }}.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('authenticated/images/profile-img.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <form class="form-horizontal"  action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email"
                                               value="{{ config('app.debug') ? 'admin@ankitakesari.com.np' : old('email') }}"
                                               id="email" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control"
                                                   value="{{ config('app.debug') ? 'I_}zlpqijCLF' : '' }}"
                                                   name="password"
                                                   placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>
{{--                                    <div class="mt-4 text-center">--}}
{{--                                        <h5 class="font-size-14 mb-3">Sign in with</h5>--}}

{{--                                        <ul class="list-inline">--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">--}}
{{--                                                    <i class="mdi mdi-facebook"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="javascript::void()" class="social-list-item bg-info text-white border-info">--}}
{{--                                                    <i class="mdi mdi-twitter"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="list-inline-item">--}}
{{--                                                <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">--}}
{{--                                                    <i class="mdi mdi-google"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}

{{--                                    <div class="mt-4 text-center">--}}
{{--                                        <a href="#" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>--}}
{{--                                    </div>--}}
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
{{--                            <p>Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary"> Signup now </a> </p>--}}
                            <div class="col-sm-12">
                                <script>document.write(new Date().getFullYear())</script>
                                © {{ getBusinessSetting('app_name') }}.
                            </div>
                            <div class="col-sm-12">
                                <div class="d-none d-sm-block">
                                    Design & Develop by {{ getBusinessSetting('meta_site_author') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
