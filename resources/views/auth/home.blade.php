<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Home | KATSURA VN</title>
</head>
@include('partials.header')
<body> 
    <div class="container">
        <div class="text-center mt-5">
            <h1>Welcome to KATSURA VN</h1>            
        </div>
        <div class="row mt-3">
            <img src="{{ asset('assets/images/bg-katsuravn.jpg') }}" alt="bg">
        </div>
    </div>  
</body>
@include('partials.footer')

</html>