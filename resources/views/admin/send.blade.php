
<!DOCTYPE html>
<html lang="en">
  <head>

  <style type="text/css">
    label
    {
      display: inline-block;
      width: 200px;
    }
  </style>
    
  <base href="/public">
    @include('admin.css')
    <style>
        .placeholder-color::placeholder {
    color: #b0b0b0; /* Change the color to your desired value */
}
    </style>
</head>
  <body>
    <div class="container-scroller">
    
      <!-- partial:partials/_sidebar.html -->
      <!-- sidebar Navigation -->
      @include('admin.slidebar')
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      @include('admin.navigation')
      <!-- partial -->
      
      <div class="container-fluid page-body-wrapper">


     
        <div class="container" align="center" style="padding-top:100px;">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    {{ session()->get('message') }}
  </div>
@endif

            <form action="{{url('sendemail',$data->id  )}}" method="POST" enctype="multipart/form-data" >
            @csrf
                <div style="padding: 15px;">
                    <label>Greeting</label>
                    <input class="placeholder-color"  value="Email from CDC " style="background-color:transparent;" type="text" name="greeting" placeholder="write the name">
                </div>


                <div style="padding: 15px;">
                    <label>Body</label>
                    <input class="placeholder-color"  value="Congraclation you are coalfted to be member " style="background-color:transparent;" type="text" name="body" placeholder="Phone Number">
                </div> 

                <div style="padding: 15px;">
                    <label>Action Text</label>
                    <input class="placeholder-color" style="background-color:transparent;" type="text" name="action" placeholder="Phone Number">
                </div> 

                <div style="padding: 15px;">
                    <label>Action URL</label>
                    <input class="placeholder-color" style="background-color:transparent;" type="text" name="actionurl" placeholder="Phone Number">
                </div> 

                <div style="padding: 15px;">
                    <label>End Part</label>
                    <input class="placeholder-color" style="background-color:transparent;" type="text" name="end" placeholder="Phone Number">
                </div> 
                <div style="padding: 15px;">
                     <input type="submit"  class="btn btn-success">
                </div>


             </form>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
      @include('admin.script')
  </body>
</html>