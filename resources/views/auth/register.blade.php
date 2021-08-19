@extends('layout/main-auth')

@section('main')
<div class="container">
    <div class="row text-center  ">
        <div class="col-md-12">
            <br /><br />
            <h2>Registration</h2>
             <br />
        </div>
    </div>
    <div class="row">           
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
            		<strong>  New User ? Register Yourself </strong>  
                </div>

                <div class="panel-body">
                	<!-- alert	 -->
                    <div>

                    </div>
                    <!-- end-alert -->

                    <form action="/register" method="post">
                        @csrf
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-fw fa-user"  ></i></span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Your Name" autofocus />
                        </div>
                        @error('name')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-fw fa-envelope"  ></i></span>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" />
                        </div>
                        @error('email')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror

                         <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-fw fa-phone"></i></span>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Your Phone Number" />
                        </div>

                        @error('phone')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-fw fa-lock"  ></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" />
                        </div>
                        @error('password')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-fw fa-lock"  ></i></span>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype Password" />
                        </div>
                        @error('password_confirmation')
                            <div class="form-group text-danger">{{ $message }}</div>
                        @enderror
                         
                        <button class="btn btn-primary" type="submit" name="register">Register me</button>
                        <hr />
                        Already Registered ?  <a href="/login" >Login here</a>
                        </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
 @endsection