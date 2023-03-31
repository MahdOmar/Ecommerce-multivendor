@extends('Dashboard.layouts.master')


@section('content')
  
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Brands</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item active">Brands</li>
                    </ul>
                </div>            
                <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                    <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                        <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                            data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                        <span>Visitors</span>
                    </div>
                    <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                        <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                            data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                        <span>Visits</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row clearfix">
            <div class="col-lg-12">
                @include('Dashboard.layouts.notification')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Brands</strong> List</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                      
                                        <th>Photo</th>
                                      
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>                            
                                <tbody>

                                    @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$brand->title}}</td>
                                       
                                        <td><img src="{{$brand->photo}}" alt="brand image" style="max-height: 90px;max-width:120px"></td>
                                     
                                        <td>@if ($brand->status == "active")
                                            <i class="fas fa-check-square text-success" style="font-size: 25px"></i></td>

                                        @else
                                        <i class="fas fa-ban text-danger" style="font-size: 25px"></i></td>

                                        @endif
                                        <td>
                                            <a href="{{route('brand.edit',$brand->id)}}" data-toggle='tooltip' title="edit" data-placement="bottom" class="float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit " ></i></a>
                                            <form class="float-left ml-2" action="{{route('brand.destroy',$brand->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle='tooltip' data-id={{$brand->id}} title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"><i class="fas fa-trash " ></i></a>

                                            </form>

                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                  


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>                   
            </div>
        </div>

    </div>
</div>

@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.dltBtn').click(function(e){
  
    var form = $(this).closest('form');
    var dataId = $(this).data('id');
    e.preventDefault();
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    form.submit();
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
    

})


</script>
@endsection
