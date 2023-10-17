<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') - TalkFlip Escrow</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png"> -->

    <link rel="manifest" href="site.html">
    <link rel="apple-touch-icon" href="icon.html">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
            
<style>
      .dp-box{
                width:100%;
              height:300px;
                background-color:grey;
                background-image:url("css/undraw_buy_house_560d.svg");
                position:relative;
            }
    .dp-box .avatar{
        width:200px;
        height:200px;
        object-fit:contain;
        border-radius:100%;
        border:solid white 3px;
        position:absolute;
        left:50px;
        bottom:-80px;
    }
    .dp-box #but{

      position:absolute;
      z-index:10;
      bottom:-70px;
      left:60px;
      
        
        
    }
    #user-id{
        text-transform: uppercase;
      
    }

    </style>
    
</head>

<body>

    <div id="preloader" class="d-none">
        <div class="loader d-none">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div>


    <!-- header -->
    <div class="header">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <!-- <i class="icofont icofont-dart"></i> -->
                    <img src="/assets/images/logo-mini.png" alt="" style="width:30px; height:30px;">
                    <span class="brand-title">TalkFlip</span>
                </a>
            </div>
        </div>

        <div class="header-content">
            <div class="header-left d-flex">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>

                </div>
                <div class="nav-search-box">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Search">
                </div>
            </div>
        </div>


        <div class="navbar-custom-menu pull-right d-flex nav-right">
           
               
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-danger">
                        <span></span>
                    </span>
                    <i class="fa fa-bell"></i>
                </a>

                <div class="dropdown-menu notification-dropdown dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <li class="header">You have 0 notifications</li>
                    <li>
                        <ul class="menu">
                            
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all</a>
                    </li>
                </div>
            </div>

           

            <div class="dropdown">
                <a class="dropdown-toggle user-profile-dropdown" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="user-img">
                        <img src="/gallery/{{$admin->photo}}" alt="" style="width:20px;">
                    </span>
                    <span class="user-name">{{$admin->name}}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/admin/profile">
                        <i class="fa fa-user-circle" aria-hidden="true"></i> Profile
                    </a>
                    
                    <a class="dropdown-item" href="/admin/logout">
                        <i class="fa fa-power-off" aria-hidden="true"></i> Logout
                    </a>
                </div>
            </div>

        </div>

    </div>
    <!-- #/ header -->


    <!-- sidebar -->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="menu-heading">
                    <span class="nav-text">Main</span>
                </li>
                <li>
                    <a href="/" aria-expanded="true">
                        <i class="fa fa-dashboard"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
             
              
                
                
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="fa fa-exchange"></i>
                        <span class="nav-text">Offers</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="offers">All Offers</a>
                        </li>
                     
                       
                    </ul>
                </li> 
                
               
                  <li>
                    <a class="" href="/admin/trades" aria-expanded="false">
                        <i class="fa fa-exchange"></i>
                        <span class="nav-text">Trades</span>
                    </a>
                   
                </li>
              
                <li>
                    <a href="/admin/assets" aria-expanded="false">
                        <i class="fa fa-credit-card"></i>
                        <span class="nav-text">Assets</span>
                    </a>
                </li>  
                <li>
                    <a href="/admin/users" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li>
                
                <li>
                    <a href="/admin/deposits" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">Debits</span>
                    </a>
                </li>   
                
                <li>
                    <a href="/admin/deposits" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">Deposits</span>
                    </a>
                </li>   <li>
                    <a href="/admin/withdrawals" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">Withdrawals</span>
                    </a>
                </li> 
                

                <li>
                    <a href="profile" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
               
                
                
            </ul>
        </div>
        <!-- #/ nk nav scroll -->
    </div>
    <!-- #/ sidebar -->
    @yield('content') 
    
    <div class="container-fluid copyright-section">
        <div class="row">
            <div class="col-lg-12">
                <p class="copyright">&copy; Copyright {{date('Y')}}. All Rights Reserved.</p>
            </div>
        </div>
    </div>





    <!-- Modernizr-3 -->
    <!-- jQuery -->
    <script src="/assets/plugins/common/common.min.js"></script>
    <!-- custom scripts -->
    <script src="/js/scripts.js"></script>

    <script src="/assets/plugins/chartjs/Chart.bundle.js"></script>
    <script src="/js/dashboard.js"></script>

    <script>  $(document).ready(function(){
            
  
  
  
  var more = function(dd) {
      
      var dropId=dd.getAttribute('data-target');
   //alert(dropId);
   
   $(".udropdown").hide();
  $(dropId).slideToggle();   
     
  };
            $("#but").click(function(){
              
                $("#file_input").click();


            });
            
            
        });
               
            $("#but").click(function(){
              
                $("#file_input").click();


            });
            
            
        });
        function getImage(){
          var logoBox=document.getElementById("av-box");
          var file = document.querySelector('#file_input').files[0];
          var reader = new FileReader();
          var basestring;
          reader.onloadend=function (){

            basestring=reader.result;
            logoBox.src=basestring;
          };
              reader.readAsDataURL(file);
        }
            
    </script>


</body>

 </html>