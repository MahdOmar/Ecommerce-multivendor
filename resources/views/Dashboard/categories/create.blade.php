@extends('Dashboard.layouts.master')


@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Categories</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Categories</li>
                        <li class="breadcrumb-item active">Add Category</li>
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

                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Title <span class="text-danger">*</span></label>                           
    
                                        <input type="text" class="form-control" name='title' placeholder="Title" value="{{old("title")}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Summary </label>                           
    
                                        <textarea  class="form-control" placeholder=" write some text ..." name="summary">{{old('summary')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Is_parent:</label>  
                                        <input id="check" type='checkbox' name="is_parent" value="1" checked > Yes                         
    

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
                                    <input id="thumbnail" class="form-control" type="text" name="photo" >
                                  </div>
                                  <div id="holder" style="margin-top:15px;max-height:100px;">    </div>                     

                            </div>
                        </div>
                            
                        <div class="col-lg-12 col-md-12 col-sm-12 d-none" id="parent_cat">      
                            <label for="">Parent Category:</label>                            
                            <select name="parent_id" class="form-control show-tick">
                                <option value="">-- Parent Category --</option>
                                @foreach ($parents_cat as $item)

                                <option value="{{$item->id}}" {{old('parent_id') == $item->id ? 'selected' : ''}}>{{$item->title}}</option>
                                    
                                @endforeach
                              
                            </select>
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

<script>
    $('#check').change(function(e){
        e.preventDefault();
        var is_check = $('#check').prop('checked');
       if(is_check){
           $('#parent_cat').addClass('d-none');
           $('#parent_cat').val('')

       }
       else{
        $('#parent_cat').removeClass('d-none');
        


       }
    })

</script>
    
@endsection
