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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha384-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">All Employee</h2>
    <hr>


<a href="{{url('add')}}" class="btn btn-info my-3">Add Employee</a>  

    
        
    
    <table class="table table table-striped" >
        <thead>
          <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

       @foreach($data as $key=>$item)
            
          <tr>
            
            <td>{{$key+1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td><img src="/img/{{ $item->image }}" width="90px"></td>
            
            
            <td>
  <!-- <a href="{{url('show-data')}}" class="btn btn-info" id="details" title="Details"><i data-feather="eye"></i></a>  -->
  <a href="{{url('edit/'.$item->id)}}" class="btn btn-warning" id="edit" title="Edit"><i data-feather="edit"></i></a>  
  <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" title="Delete"><i data-feather="trash-2"></i></a>
            </td>
          </tr>

       @endforeach
         
        </tbody>
      </table>

      {!! $data->links() !!}
<hr>
<h3 class="text-center text-danger my-2">--Trash List--</h3>
<table class="table table table-striped" >
        <thead>
          <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

       @foreach($trashdata as $key=>$item)
            
          <tr>
            
            <td>{{$key+1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td><img src="/img/{{ $item->image }}" width="90px"></td>
            
            
            <td>
  <!-- <a href="{{url('show-data')}}" class="btn btn-info" id="details" title="Details"><i data-feather="eye"></i></a>  -->
  <a href="{{url('restore-data/'.$item->id)}}" class="btn btn-warning">Restore</a>  
  <a href="{{url('parmanent-delete-data/'.$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" title="Delete">Delete</a>
            </td>
          </tr>

       @endforeach
         
        </tbody>
      </table>
</div>

<!-- Bootstrap JS, jQuery, and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- SweetAlert JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
<script>
  feather.replace();
</script>


</body>
</html>
