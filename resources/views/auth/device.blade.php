<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>My Devices</title>
</head>
@include('partials.header')
<body> 
    <div class="text-center mt-5">        


        <h1>Devices Monitoring</h1>
    </div>
    <div class="container mt-5">      
        @if (!empty($listDevices))
        <?php
            $num = 1;
        ?>
            @foreach($listDevices as $device)
            <div class="container row ">
                <div class="d-flex col-12  ">
                    <h5 class="col-1 mt-2"> <a href="detail/{{$device->serialNumber}}">#{{ $num++  }}</a> </h5>
                    <h5 class="col-4 mt-2"> {{ $device->name }} </h5>
                    <h5 class="col-3 mt-2" id="mqttBattery">  {{ $device->address }}  </h5>  
                    <div class="col-2 mt-2"> 
                        @if($device->status == 1)
                            <span class="badge bg-success ">ON</span>
                        @else
                            <span class="badge bg-secondary">OFF</span>
                        @endif
                    </div>                   
                    <h5 class="col-2">  
                        <a href="detail/{{$device->serialNumber}}" class="btn btn-warning">
                            {{ $device->serialNumber }} 
                        </a>                            
                    </h5>   
                    
                </div>   
            </div>        
            <hr>                          
            @endforeach          
        @else
            <div class="form-froup text-center">
                <p class="">
                    No device!
                </p>
                <a href="#" class="btn btn-info">Contact us</a>
            </div>         
        @endif
    </div>         
</body>
@include('partials.footer')
</html>