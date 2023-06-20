<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/mqtt.js') }}"></script>
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Device Log</title>
</head>
@include('partials.header')
<body>
    <div class="d-flex justify-content-left">
                {{-- <a href='/device' class="btn btn-secondary "> Back to list </a>  --}}
                <a href="/device" class="btn btn-warning position-relative">
                    Back to list
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{  session('countDevices')>0? session('countDevices') : 0 }}                    
                    </span>
                  </a>
            </div>
        <div class="d-flex justify-content-center">
            
            <div class="card  col-xl-4 col-md-6">
                <div class="card-body">
                    <div class="row">
                        {{-- kiểm tra thiết bị có tồn tại hay không --}}
                        @if(empty($detail))
                            <h4>This device is not available! <a href="/device">Back to list</a></h4>
                        @else
                        {{-- hiển thị log của thiết bị --}}
                                <div id="tinnhan"></div>
                                <div class="container row">
                                    <div class="d-flex col-12">
                                        <h4 class="col-4"> Serial: </h4>
                                        <h4 class="col-8"> {{ $detail->serialNumber }} </h4>     
                                    </div>
                                    <div class="d-flex col-12">
                                        <h4 class="col-4"> Battery: </h4>
                                        <h4 class="col-xl-8" id="mqttBattery"> {{ (float)$detail->battery }} % </h4>     
                                    </div>
                                    <div class="d-flex col-12">
                                        <h4 class="col-4"> Gas: </h4>
                                        <h4 class="col-xl-8" id="mqttGas"> {{ (float)$detail->gas }} %  <span class="text-muted h6">({{ (float)$detail->gas * 12 / 100 }} KG)</span></h4>     
                                    </div>
                                    <div class="d-flex col-12">
                                        <h4 class="col-4"> Published: </h4>
                                        <h4 class="col-8"> {{ $detail->publishedOnUTC }} </h4>     
                                    </div>
                                </div>
                    
                                <div>
                                    <hr>
                                <a href="#" class="btn btn-info text-white text-right">Contact us</a>                 
                                </div>        
                                {{-- xử lý MQTT --}}
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
                                <script type="text/javascript">
                                    var $serialNumber =  '{{ $detail->serialNumber }}';
                                    const dbBattery =  '{{ (float)$detail->battery }}';
                                    const dbGas =      '{{ (float)$detail->gas }}';

                                    var Conn = { hostname: '14.225.192.41', port: 9002 };
                                    client = new Paho.MQTT.Client(Conn.hostname, Number(Conn.port), "clientId");
                                    client.onConnectionLost = onConnectionLost;
                                    client.onMessageArrived = onMessageArrived;
                            
                                    client.connect({onSuccess:onConnect});

                                    function onConnect() {
                                    console.log("onConnect");
                                    client.subscribe($serialNumber);
                                    }
                                    function onConnectionLost(responseObject) {
                                        if (responseObject.errorCode !== 0) {
                                            console.log("onConnectionLost:"+responseObject.errorMessage);
                                        }
                                    }
                                    function onMessageArrived(message) {
                                        let receivedValue = message.payloadString;
                                        // xử lý chuỗi
                                        let mqttBattery = (receivedValue.substring(0,3));   
                                        let mqttGas = parseFloat(receivedValue.substring(3,6));
                                        console.log(receivedValue + "///" + mqttBattery + "%___" + mqttGas + "%");
                                        //gán giá trị nhận được từ MQTT vào thẻ hiển thị GAS & BATTERY
                                        let mqttGasElement = document.getElementById("mqttGas");
                                        let mqttBatteryElement = document.getElementById("mqttBattery");

                                        if(dbBattery - mqttBattery > 0 || mqttBattery - dbBattery >90)
                                            mqttBatteryElement.innerText = parseFloat(mqttBattery);                 
                                        if(dbGas - mqttGas > 0 || mqttGas - dbGas > 90)
                                            mqttGasElement.innerText = parseFloat(mqttGas); 
                                    }
                                </script>    
                        @endif       
                    </div>
                    
                </div> <!-- card-body.// -->
            </div>  <!-- card .// -->                      
        </div>
    </div>
</body>
@include('partials.footer')
</html>
