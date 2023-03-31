@extends('Dashboard.layouts.master')


@section('content')
  
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Products</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item active">Products</li>
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
                        <h2><strong>Products</strong> List</h2>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                      
                                        <th>Photo</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Size</th>
                                        <th>Condition</th>




                                      
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>                            
                                <tbody>

                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->title}}</td>
                                       
                                        <td><img src="{{$product->photo}}" alt="product image" style="max-height: 90px;max-width:120px"></td>
                                          <td>${{ number_format( $product->price,2)}}</td>
                                          <td>{{ $product->discount}}%</td>
                                          <td>{{ $product->size}}</td>


                                        <td>
                                            @if ($product->conditions == 'new')
                                            <span class="badge badge-success ">{{$product->conditions}}</span>
                                                
                                            @elseif($product->conditions == 'popular') 
                                            <span class="badge badge-primary">{{$product->conditions}}</span>
                                             @else
                                             <span class="badge badge-warning">{{$product->conditions}}</span>

                                            @endif
                                        </td>


                                        <td>@if ($product->status == "active")
                                            <i class="fas fa-check-square text-success" style="font-size: 25px"></i></td>

                                        @else
                                        <i class="fas fa-ban text-danger" style="font-size: 25px"></i></td>

                                        @endif
                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}" title="view" data-placement="bottom" class="float-left btn btn-sm btn-outline-secondary"><i class="fas fa-eye " ></i></a>
                                            
                                            <a href="{{route('product.edit',$product->id)}}" data-toggle='tooltip' title="edit" data-placement="bottom" class="float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit " ></i></a>
                                            <form class="float-left ml-2" action="{{route('product.destroy',$product->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle='tooltip' data-id={{$product->id}} title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"><i class="fas fa-trash " ></i></a>

                                            </form>

                                        </td>
                                                                    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        @php
            $product = \App\Models\Product::where('id',$product->id)->first();
        @endphp
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{$product->title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <strong>Summary</strong>
          <p>{{$product->summary}}</p>

          <strong>Description</strong>
          <p>{{$product->description}}</p>

          <div class="row">
            <div class="col-md-4">
                <strong>Price</strong>
                <p>${{number_format($product->price,2)}}</p>
            </div>

            <div class="col-md-4">
                <strong>Offer Price</strong>
                <p>${{number_format($product->offer_price,2)}}</p>
            </div>
            <div class="col-md-4">
                <strong> Stock</strong>
                <p>{{$product->stock}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <strong>Brand</strong>
                <p>{{ \App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
            </div>

            <div class="col-md-4">
                <strong>Size</strong>
                <p class="badge badge-success">{{ $product->size}}</p>
            </div>
            <div class="col-md-4">
                <strong>Vendor</strong>
                <p>{{\App\Models\User::where('id',$product->vendor_id)->value('full_name') }}</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
                <strong>Category</strong>
                <p>{{ \App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
            </div>

            <div class="col-md-6">
                <strong>Child Category</strong>
                <p>{{ \App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
            </div>
          </div>

        

          <div class="row">
            
            <div class="col-md-6">
                <strong>Conditions</strong>
                <p class="badge badge-primary">{{ $product->conditions}}</p>
            </div>

            <div class="col-md-6">
                <strong>Status</strong>
                <p class="badge badge-warning">{{ $product->status}}</p>
            </div>
          </div>


        

         

         

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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
