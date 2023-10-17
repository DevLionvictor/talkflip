<!doctype html>
<html lang="en">

 <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
<title>Password Reset - TalkFlip Escrow </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="/adminassets//images/favicon.ico">

    <!-- Bootstrap Css -->
<link href="/adminassets//css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="/adminassets//css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="/adminassets//css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                       <h5 class="text-primary">Recovery</h5>
                                        <!-- <p>Sign in to continue to Talkflip</p>-->
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="/adminassets//images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="/" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/adminassets//images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="/" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="/adminassets//images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            @if(isset($pass))
                            <div class="p-2">
                                <form class="form-horizontal" method="post" action="/recovery/reset">
                          <h3> Reset Password</h3>
                          
                                @csrf <!-- {{ csrf_field() }} -->
                                @if(isset($Error_Message))
                                        <div class="alert alert-danger">   {{$Error_Message}} 
                                        </div>
                                @endif
           
                                    <p>
                                            Create new Password
                                    </p>
                                    <input type="hidden" name="email" value="{{$password_reset->email}}">
                                    <input type="hidden" name="token" value="{{$password_reset->token}}">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password1" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password2" placeholder="Confirm
                                             password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                   

                                     

                                     

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Change Password</button>
                                    </div>
        <br>
                                 
            <a href="/login">

           Login
            </a>
                                    
                                </form>
                            </div>
                            @else
                                    <div class="alert alert-danger">
                                                 {{$Error_Message}}
                                    </div>
                            @endif

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                       
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
<script src="/adminassets//libs/jquery/jquery.min.js"></script>
<script src="/adminassets//libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/adminassets//libs/metismenu/metisMenu.min.js"></script>
<script src="/adminassets//libs/simplebar/simplebar.min.js"></script>
<script src="/adminassets//libs/node-waves/waves.min.js"></script>
    <!-- App js -->
    <script src="/adminassets//js/app.js"></script>
</body>


 </html>