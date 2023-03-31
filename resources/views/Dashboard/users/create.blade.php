@extends('Dashboard.layouts.master')


@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Users</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Add Users</li>
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
            <div class="col-lg-12 ">
              
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                            
                        @endforeach
                    </ul>

                </div>
               
                    
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                   
                    <div class="body">

                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Full Name <span class="text-danger">*</span></label>                           
    
                                        <input type="text" class="form-control" name='full_name' placeholder="full_name" value="{{old("full_name")}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Username <span class="text-danger">*</span></label>                           
    
                                        <input type="text"  class="form-control" placeholder=" username" name="username" value="{{old('username')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Email <span class="text-danger">*</span></label>                           
    
                                        <input type="text"  class="form-control" placeholder=" email" name="email" value="{{old('email')}}">
                                    </div>
                                </div>
                               
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Phone <span class="text-danger">*</span></label>                           
    
                                        <input type="number"  class="form-control" placeholder=" phone" name="phone" value="{{old('phone')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Address <span class="text-danger">*</span></label>                           
    
                                        <input type="text"  class="form-control" placeholder=" Address" name="address" value="{{old('address')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">     
                                    <label for="">Role </label>                           
                                    <select name="role" class="form-control show-tick">
                                        <option value="">-- Role --</option>
                                        <option value="admin" {{old('role') == 'admin' ? 'selected' : ''}}>Admin</option>
                                        <option value="customer" {{old('role') == 'customer' ? 'selected' : ''}}>Customer</option>
                                        <option value="vendor" {{old('role') == 'vendor' ? 'selected' : ''}}>Vendor</option>

                                    </select>
                                </div>
    
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Password <span class="text-danger">*</span></label>                           
    
                                        <input type="password"  class="form-control" placeholder="password" name="password" value="{{old('password')}}">
                                    </div>
                                </div>

                                
    
                            </div>

                        
                       
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="">Images <span class="text-danger">*</span></label>  
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo">
                                  </div>
                                  <div id="holder" style="margin-top:15px;max-height:100px;">    </div>                     

                            </div>
                        </div>
                            


                          



                            <div class="col-lg-12 col-md-12 col-sm-12">   
                                <label for="">Status:</label>                            
                             
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Status --</option>
                                    <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                            </div>

                        </form> 

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

     
    </div>
</div>

@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
     $('#lfm').filemanager('image');
</script>
    
@endsection
