@extends('layout/main-auth')

@section('main')
<div class="container">
    <div class="row text-center ">
        <div class="col-md-12">
            <br /><br />
            <h2>Login Admin</h2>
           
            <h5>( Login yourself to get access )</h5>
             <br />
        </div>
    </div>
     <div class="row ">
           
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>   Enter Details To Login </strong>  
                </div>
                <div class="panel-body">

                    <!-- alert sukses-->
                    <div>
                    @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                    @endif  
                    </div>
                    <!-- end-alert    -->

                    <!-- alert error-->
                    <div>
                    @if (session('error'))
                          <div class="alert alert-danger">
                              {{ session('error') }}
                          </div>
                    @endif  
                    </div>
                    <!-- end-alert    -->

                    <form action="/admin/login" method="post">
                        @csrf
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" autofocus />
                        </div>
                        @error('email')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Password" />
                        </div>
                        @error('password')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-primary" type="submit" name="login">Login</button>
                        <hr />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection