@extends('admin.layouts.main')

@section('content')
    <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h1 class="mb-0 h3">Đăng nhập</h1>
                        </div>
                        <form action="{{route('login-admin')}}" class="mt-4" method="post">
                            @csrf

                            @if(session('error'))
                                <span class="text text-danger">{{session('error')}}</span>
                            @endif
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="email">Tên đăng nhập</label>
                                <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                        </span>
                                    <input type="text" class="form-control" name="name" autofocus required>
                                </div>

                                @if($errors->has('name'))
                                    <span class="text text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <!-- End of Form -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="password">Mật khẩu</label>
                                    <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        <input type="password"  class="form-control" name="password" required>
                                    </div>

                                    @if($errors->has('password'))
                                        <span class="text text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-gray-800">Đăng nhập</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
