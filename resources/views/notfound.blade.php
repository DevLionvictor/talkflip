 
 
 <!doctype html>
<html lang="en">

 <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
<title>Resource not found</title>
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
                                <div class="col-12 text-center"> <h2>Resource not found </h2><div class="alert alert-danger">



The resource you are looking for does not exst or it appears t0 have been deleted  

 </div>  
 
 
           <button onclick="goBack()" class="btn btn-primary">  Go Back   </button></div>
                    

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
    <script>

                $(document).ready(function(){
                    
                    $("#password-addon").on('click', function(){
                        
                        if($(this).siblings('input').length > 0) {
                $(this).siblings('input').attr('type') == "password" ? $(this).siblings('input').attr('type', 'input') : $(this).siblings('input').attr('type', 'password');
            
        }
    });


                });
                function goBack(){
                    window.history.back();
                }
    </script>
</body>


 </html>
 
 