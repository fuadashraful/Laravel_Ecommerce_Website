 @extends('adminpages.adminbase')


@section('admin_content')

<div class="row"> 
  <div class="col-lg-6">
  <!-- Form Basic -->
  <div class="card mb-4">

    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Update Manufacture</h6>
    </div>
    <div class="card-body">
      <form action="/admin/update_manufacture_post/{{$manufacture->id}}" method="POST">
       {{ method_field('PUT') }}
         {{ csrf_field() }}
        <div class="form-group">
          <label for="manufactureName">Manufacture Name</label>
          <input type="text" class="form-control" id="manufactureName" name="manufactureName" aria-describedby="emailHelp"
            value="{{$manufacture->name}}">
        </div>
        <div class="form-group">
            <label for="manufactureDescription">Manufacture Description</label>
            <textarea class="form-control" id="manufactureDescription" name="manufactureDescription" rows="3">
            {{$manufacture->description}}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>

</div>
@endsection