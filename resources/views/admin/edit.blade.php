
<!DOCTYPE html>
<html lang="en">
  <head>
    

  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



  <base href="/public">
    @include('admin.css')
    
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


     
	<div class="container" >
                
        <div class="container-xl" style="overflow: hidden;">
                <div class="table-responsive" style="overflow: hidden;">
                    <div class="table-wrapper">                       
                       <!-- Edit Modal HTML -->
						<div >
							<div class="modal-dialog">
								<div class="modal-content">
									<form method="POST" enctype="multipart/form-data" action="{{url('editDoctor',$data->id)}}" >

									@csrf
										<div class="modal-header">						
											<h4 >Edit Doctor</h4>
											<button style="color: white;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div  >
										<div  class="modal-body">					
											<div  class="form-group">
												<label>Name</label>
												<input value="{{$data->name}}" name="name" style="background-color:#222;color:white;" type="text" class="form-control" required>
											</div>
											<div >
												<label>phone</label>
												<input value="{{$data->phone}}" name="phone" style="background-color:#222;color:white" type="text" class="form-control" required>
											</div>
											<div >
												<label>Speacialty</label>
												<input value="{{$data->speacilty}}" name="speacilty" style="background-color:#222;color:white" type="text" class="form-control" required>
											</div>
											<div >
												<label>Room Number</label>
												<input value="{{$data->room}}" name="room" style="background-color:#222;color:white" type="text" class="form-control" required>
											</div>
											<div >
											<label>Previews Image</label>

                                            <td>
  <a data-toggle="modal" style="cursor: pointer;" data-target="#imageModal{{$data->id}}">
    <img style="width: 90px; height: 90px; border-radius: 0;" src="doctorimage/{{$data->image}}">
  </a>
</td>

<!-- Modal -->
<div class="modal fade" id="imageModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <img style="width: 400px; height: 400px;" src="doctorimage/{{$data->image}}">
      </div>
    </div>
  </div>
</div>

										</div>	
											<div >
											<label>Image</label>
												<input  name="file"  type="file" class="form-control" required>
											</div>		
													
										</div>
										<div style="background-color:inherit;" class="modal-footer">
											<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
											<input type="submit" class="btn btn-info" value="Save">
										</div>
									</form>
								</div>
							</div>
						</div>
                        
                    </div>
                    
            </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
</div>
      
<script>
function zoomImage(image) {
  image.style.width = "300px";
  image.style.height = "300px";
}
</script>
      @include('admin.script')
  </body>
</html>