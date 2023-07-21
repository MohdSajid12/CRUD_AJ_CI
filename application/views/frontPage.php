

<!doctype html>
<html lang="en">
<head>                                                   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/Rgstr.css') ?>">

</head>

<body ng-app="myApp" ng-controller="myCtrl">
<h1 align="center">Welcome to CRUD Application</h1>
    <img src="<?php echo base_url('assets/images/lap.jpg'); ?>">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <div>
                    <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Login</button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addModal">Sign-up
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Signup Code start-->

    <div id="addModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Create Account</b></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="hidden" id="id" ng-model="id">
                        </div>
                        
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1cg"
                           >Your Name</label>
                            <input type="text" id="form3Example1cg" class="form-control form-control-lg"  ng-model="firstname">  
                           <small class="form-text f-14 text-left vi-red-clr" ng-bind-html="trustedHtml(errors.firstname)" style="color:red"></small>
                        </div>
                        
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3cg"
                            >Your Email</label>
                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" ng-model="email">
                            <small class="form-text f-14 text-left vi-red-clr" ng-bind-html="trustedHtml(errors.email)" style="color:red"></small>    
                        </div>
            
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4cg"
                            >Password</label>
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" ng-model="password"> 
                            <small class="form-text f-14 text-left vi-red-clr" ng-bind-html="trustedHtml(errors.password)" style="color:red"></small> 
                        </div>
                            
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4cdg"
                           >Repeat your password</label>
                            <input type="password" id="form3Example4cdg" class="form-control form-control-lg"  ng-model="cpassword">
                            <small class="form-text f-14 text-left vi-red-clr" ng-bind-html="trustedHtml(errors.cpassword)" style="color:red"></small>
                        </div>
                       

                        <div class="d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" ng-click="insertData()">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Signup code close -->

 
    <!-- Login code start -->
    <div id="loginModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="alert alert-danger alert-dismissible fade show" ng-if="errorMessage">
    {{errorMessage}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

                <div class="modal-header">             
                    <h4 class="modal-title"><b>Login Account</b></h4>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form ng-submit="">
                        <div class="form-group">
                            <input type="hidden" id="id" ng-model="id">
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3cg">Your Email</label>
                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" ng-model="email" >
                            <small class="form-text f-14 text-left vi-red-clr" ng-bind-html="trustedHtml(errors.email)" style="color:red"></small> 
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example4cg">Password</label>
                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" ng-model="password"/>
                            <small class="form-text f-14 text-left vi-red-clr" ng-bind-html="trustedHtml(errors.password)" style="color:red"></small> 
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" ng-click="loginData()">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <!-- Login code close -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>


        <script>
    var app = angular.module("myApp", []);

    var $config = {
        'base_url': '<?php echo $this->config->item("base_url") ?>'
    }

    app.controller("myCtrl", ['$scope', '$http', '$sce', function ($scope, $http, $sce) {

        $scope.trustedHtml = function(plainText) {
                return $sce.trustAsHtml(plainText);
            };
            $scope.errors = {};
            
            
        $scope.insertData = function () {
            var data = $.param({
                'firstname': $scope.firstname,
                'email': $scope.email,
                'password': $scope.password,
                'cpassword': $scope.cpassword,
            });

            $http({
                method: 'POST',
                url: $config.base_url + 'Signup/addUser',
                data: data,
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            }).then(function(response) {
                        if (response.data.status === 'success') {
                            alert('Registration successful');

                            $scope.errors ='';
                                $scope.firstname = '';
                                $scope.email = '';
                                $scope.password = '';
                                $scope.cpassword ='';
                        } else {
                            $scope.errors = response.data.errors;
                        }
                    })
                    .catch(function(error) {
                        console.log('Error:', error);
                    });
        }

        $scope.loginData = function() {
            var data = $.param({
                'email': $scope.email,
                'password': $scope.password,
            });
            $http({
                    method: 'POST',
                    url: $config.base_url + 'Login/loginUser',
                    data: data,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
                }).then(function(response) {
                    if (response.data.status === 'success') {
                        alert('Login Successfull');
                        $scope.message = response.data.success_message;
                        window.location.href = "<?php echo base_url('Crud') ?>"
                        $scope.errors = '';
                        $scope.email = '';
                        $scope.password = '';
                    } else {
                        $scope.errors = response.data.errors;
                        $scope.errorMessage = response.data.error_message;
                    }
                })
                .catch(function(error) {
                    console.log('Error:', error);
                });
        }



    }]);

</script>
</body>

</html>