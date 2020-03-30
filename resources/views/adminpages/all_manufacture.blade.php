@extends('adminpages.adminbase')

@push('CSS')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('admin_content')
<!-- DataTable with Hover -->
<div class="col-lg-12">
   
        <!-- printing message -->
            <?php
                $message=Session::get('message');
                $message_active=Session::get('message-active');
                $message_deactive=Session::get('message-deactive');
                $message_delete=Session::get('message-delete');
                if($message)
                {
                    echo '<div class="alert alert-warning" role="alert">'.$message.'</div>';
                    Session::put('message',null);
                }

                if($message_active)
                {
                    echo '<div class="alert alert-success" role="alert">'.$message_active.'</div>';
                    Session::put('message-active',null);
                }

                if($message_deactive)
                {
                    echo '<div class="alert alert-danger" role="alert">'.$message_deactive.'</div>';
                    Session::put('message-deactive',null);
                }
                if($message_delete)
                {
                    echo '<div class="alert alert-danger" role="alert">'.$message_delete.'</div>';
                    Session::put('message-delete',null);
                }
            ?>
        <!-- End printing message -->

    <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All Manufactureer List</h6>
    </div>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
        <thead class="thead-light">
            <tr>
                <th>Manufactureer ID</th>
                <th>Manufactureer Name</th>
                <th>Status</th>
                <th>Active/Inactive</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>

            <tr>
                <th>Manufactureer ID</th>
                <th>Manufactureer Name</th>
                <th>Status</th>
                <th>Active/Inactive</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

        </tfoot>
        <tbody>

            @foreach($all_manufacturer as $data)
                <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                @if($data->publication_status==0)
                <td><span class="badge badge-warning">Inactive</span></td>
                @else
                <td><span class="badge badge-success">Active</span></td>
                @endif
                <!-- <td>{{$data->publication_status}}</td> -->
                @if($data->publication_status==0)
                <td><a class="text-success" href="{{URL::to('/admin/toggle_manufacture_status/'.$data->id.'/'.$data->publication_status)}}" > Enable<i class="fa-2x fas fa-arrow-up"></i></a></td>
                @else
                <td><a class="text-danger" href="{{URL::to('/admin/toggle_manufacture_status/'.$data->id.'/'.$data->publication_status)}}" >Disable <i class="fa-2x fas fa-arrow-down"></i></a></td>
                @endif
                <td> <a class="text-success"  href="{{URL::to('/admin/update_manufacture/'.$data->id)}}"><i class="fa-2x fas fa-pen-alt"></i></a></td>
                <td><a class="text-danger" href="{{URL::to('/admin/delete_manufacturerer/'.$data->id)}}"><i class="fa-2x fas fa-trash-alt"></a></i></td>
                 
                </tr>
                <tr>
            @endforeach
 
        </tbody>
        </table>
    </div>
    </div>
</div>
</div>

@endsection

@push('JS')
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endpush