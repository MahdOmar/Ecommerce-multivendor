@extends('Dashboard.layouts.master')


@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Edit Banners</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Banners</li>
                        <li class="breadcrumb-item active">Edit Banners</li>
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

                        <form action="{{route('banner.update',$banner->id)}}" method="POST">
                            @csrf
                            @method("patch")
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Title <span class="text-danger">*</span></label>                           
    
                                        <input type="text" class="form-control" name='title' placeholder="Title" value="{{$banner->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Description <span class="text-danger">*</span></label>                           
    
                                        <textarea  class="form-control" placeholder=" write some text ..." name="description">{{$banner->description}}</textarea>
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
                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$banner->photo}}">
                                  </div>
                                  <div id="holder" style="margin-top:15px;max-height:100px;">    </div>                     

                            </div>
                        </div>
                            


                            <div class="col-lg-12 col-md-12 col-sm-12">     
                                <label for="">Condition </label>                           
                                <select name="condition" class="form-control show-tick">
                                    <option value="">-- Condition --</option>
                                    <option value="banner" {{$banner->condition == 'banner' ? 'selected' : ''}}>Bnner</option>
                                    <option value="promo" {{$banner->condition == 'promo' ? 'selected' : ''}}>Promo</option>
                                </select>
                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12">                                
                                <select name="status" class="form-control show-tick">
                                    <option value="">-- Status --</option>
                                    <option value="active" {{$banner->status == 'active' ? 'selected' : ''}}>Active</option>
                                    <option value="inactive" {{$banner->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
