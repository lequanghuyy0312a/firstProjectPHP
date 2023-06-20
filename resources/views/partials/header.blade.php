<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <header  style="background-color:rgb(0,117,189)">
        <nav class="mx-3 navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3" >
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img width="150" src="{{ asset('assets/images/logo_kvn.jpg') }}" alt="logo">
                </a>        
                    <div class="col-xl-4 col-lg-4 col-md-6" >
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header">
                                <a class="widget-view"> </a>
                                @if(strlen(session('loginID')) >0)
                                    <div class="icon-area">
                                        <a class="fa fa-user text-success " href=""></a>
                                    </div>
                                    <a>
                                        Hello:
                                    </a>
                                    <a href="/device"  class="text-primary " type="button">                                 
                                        {{ session('loginName') }}
                                    </a>
                                    <abbr class="m-3">|</abbr>
                                    <a href="/logout" class="btn btn-danger"> Log out</a>                               
                                    @else                
                                        <a  href="login"  class="btn btn-primary">Log in</a>
                                    <abbr class="m-3">|</abbr>
                                        <a   href="register"  class="btn btn-success">Register</a>             
                                @endif 
                            </div>           
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div>
        </nav>
    </header>