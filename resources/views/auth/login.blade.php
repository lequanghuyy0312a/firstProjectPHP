<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Login</title>
</head>
@include('partials.header')
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-4 col-md-offset-4 card mt-2 p-3">
                <h4>Login</h4>
                <hr>
                <form action="{{route('login-account')}}" method="post">
                    @if($errors->has('error'))
                        <div class="alert alert-danger">{{ $errors->first('error') }}</div>
           
                    @endif
                    @csrf
                    <div class="form-froup mt-2">
                        <label for="email">Account Name</label>
                        <input type="text" class="form-control" placeholder="Enter Email or Phone Number" name="email"  value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{$message}}@enderror</span>                  
                    </div>
                    <div class="form-froup mt-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password') {{$message}}@enderror</span>                  

                    </div>     
                    <div class="form-froup mt-3">
                        <button class="btn btn-primary btn-block" type="submit">
                            Login
                        </button>
                    </div>        
                    <div class="form-froup mt-4 text-center"> Don't have a account? 
                        <a href="register" class="btn btn-link">
                            Register for free!
                        </a>
                    </div>   
                </form>
            </div>
        </div>
    </div>

</body>
@include('partials.footer')
</html>