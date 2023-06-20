<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Register</title>
</head>
@include('partials.header')
<body>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6 col-md-offset-6 card mt-2 p-3">
                <h4>Register</h4>
                <hr>
                <form action="{{route('register-account')}}" method="post">
                    @csrf
                    <div class="form-froup mt-2">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter first name" name="firstname" value="{{ old('firstname') }}">
                        <span class="text-danger">@error('firstname') {{$message}} @enderror</span>           
                    </div>
                    <div class="form-froup mt-2">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter last name" name="lastname" value="{{ old('lastname') }}">
                        <span class="text-danger">@error('lastname') {{$message}}@enderror</span>
                    </div>
                    <div class="form-froup mt-2">
                        <label for="gmail">Email</label>
                        <input type="text" class="form-control" placeholder="Enter email address" name="email" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{$message}} @enderror </span>              
                    </div>
                    <div class="form-froup mt-2">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" placeholder="Enter phone number" name="phone" value="{{ old('phone') }}">
                        <span class="text-danger">@error('phone') {{$message}} @enderror </span>                
                    </div>
                    <div class="form-froup mt-2">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Enter address" name="address" value="{{ old('address') }}">
                        <span class="text-danger">@error('address') {{$message}} @enderror </span>                
                    </div>
                    <div class="form-froup mt-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password') {{$message}} @enderror </span>                
                    </div>
                    {{-- <div class="form-froup mt-2">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter confirm password" name="confirmpassword" value="{{ old('confirmpassword') }}">
                        <span class="text-danger">@error('confirmpassword') {{$message}} @enderror </span>                  
                    </div> --}}
                    <div class="form-froup mt-3">
                        <button class="btn btn-success btn-block" type="submit">
                            Register
                        </button>
                        <a href="login" class="btn btn-link">
                            Login Now!
                        </a>
                    </div>                 
                </form>
            </div>
            
        </div>
    </div>

</body>
@include('partials.footer')
</html>