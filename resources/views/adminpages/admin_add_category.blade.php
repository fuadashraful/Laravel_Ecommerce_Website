@extends('adminpages.adminbase')


@section('admin_content')

<div class="row"> 
  <div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">
    <?php
    $message=Session::get('message');
    if($message)
    {
      echo '<div class="alert alert-success" role="alert">'.$message.'</div>';
      Session::put('message',null);
    }
    ?>
   

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
    </div>
    <div class="card-body">
      <form action="{{url('admin/save-category/')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <input type="text" class="form-control" id="categoryName" name="categoryName" aria-describedby="emailHelp"
            placeholder="Enter Category Name">
        </div>
        <div class="form-group">
            <label for="categoryDescription">Category Description</label>
            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3"></textarea>
        </div>
        <!-- <div class="form-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div> -->
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" value=1 name="publicationStatus" id="publicationStatus">
            <label class="custom-control-label" for="publicationStatus">Publication Status</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>

</div>
@endsection