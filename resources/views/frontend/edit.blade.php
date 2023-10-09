<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- SweetAlert CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css"> -->
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Edit Employee Profile</h2>
    <hr>

   <form action="{{url('/update/'.$data->id )}}" method="POST" enctype="multipart/form-data">
    @csrf
   
   <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{$data->name}}" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{$data->email}}"  class="form-control">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Phone</label>
                <input type="text" name="phone" value="{{$data->phone}}"  class="form-control">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="
                    form-control" onChange="mainThamUrl(this)">

                    <img style="width:90px" src="/img/{{$data->image}} " id="mainThmb" alt="">
                @error('img')
                <span class="text-danger">{{$message}}</span>
                @enderror

                </div>
                <div class="form-group">
                
                <input type="submit" name="submit" class="btn btn-primary" value="Update Data"  >
            </div>
            <!-- Add more fields as needed -->
        </div>
        <!-- Add more columns as needed -->
    </div>
   </form>
        
    
    
</div>

<!-- Bootstrap JS, jQuery, and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    function mainThamUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]); // Corrected method name
        }
    }
</script>

</body>
</html>
