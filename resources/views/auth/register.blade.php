@extends('layouts.app')

@section('content')


    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome!</h6>

                                    <form method="POST" action="{{ route('register.form.submit') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input name="email" type="email" class="form-control" id="email">
                                        </div>

                                        <div class="form-group mb-5">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" class="form-control" id="name">
                                        </div>

                                        <div class="form-group mb-5">
                                            <label for="phone">Phone</label>
                                            <input name="phone" type="text" class="form-control" id="phone">
                                        </div>

                                        <div class="form-group mb-5">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password">
                                        </div>

                                        <button type="submit" class="btn btn-theme">Register</button>
                                    </form>

                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-black mb-4">This  beautiful theme yours!</h4>
                                        <p class="lead text-black">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="" class="text-primary ml-1">register</a></p>

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>

@endsection
