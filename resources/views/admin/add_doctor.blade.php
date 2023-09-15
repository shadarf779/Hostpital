
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

            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data" >
            @csrf
                <div style="padding: 15px;">
                    <label>Doctor Name</label>
                    <input class="placeholder-color" style="background-color:transparent;" type="text" name="name" placeholder="write the name">
                </div>


                <div style="padding: 15px;">
                    <label>Phone</label>
                    <input class="placeholder-color" style="background-color:transparent;" type="number" name="number" placeholder="Phone Number">
                </div> 

                 <div style="background-color:transparent;" style="padding: 15px;">
                    <label>Speacialty</label>
                   <select name="Speacialty" class="placeholder-color" style="background-color:transparent;width:200px;color: #b0b0b0;">
                    <option style="color:black;"> --Select--</option>
                     <option style="color:black;" value="skin">Skin </option>
                     <option style="color:black;" value="nose">Nose </option>
                     <option style="color:black;" value="eye"> Eyes </option>
                     <option  style="color:black;" value="heart"> Heart</option>

                   </select>
                </div> 
                
                <div style="padding: 15px;">
                    <label>Room Number</label>
                    <input class="placeholder-color" style="background-color:transparent;" type="text" name="room" placeholder="write the Room Number">
                </div> 
                
                <div style="padding: 15px;">
                    <label>Doctor Image</label>
                    <input style="width:200px;" type="file" name="file" >
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