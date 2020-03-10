@extends('adminpages.adminbase')



@section('admin_content')

<div class="row"> 
  <div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
    </div>
    <div class="card-body">
      <form action="/admin/update_post/{{$category->category_id}}" method="POST">
      {{ method_field('PUT') }}
         {{ csrf_field() }}
        <div class="form-group">
          <label for="categoryName">Category Name</label>
          <input type="text" class="form-control" id="categoryName" name="categoryName" aria-describedby="emailHelp"
            placeholder="Enter Category Name" value="{{$category->category_name}}">
        </div>
        <div class="form-group">
            <label for="categoryDescription">Category Description</label>
            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3">
            {{$category->category_description}}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>

</div>
@endsection