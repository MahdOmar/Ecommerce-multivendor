<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $categories = Category::orderBy('id','DESC')->get();
        return view('Dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents_cat = Category::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('Dashboard.categories.create' , compact('parents_cat'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
            'status'=>'nullable|in:active,inactive'
        ]);

        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $slug_count =Category::where('slug',$slug)->count();
     
        if($slug_count > 0)
        {
            $slug = time().'-'.$slug;

        }
        $data['slug'] = $slug;
        $data['is_parent'] = $request->input('is_parent','0');
        $status = Category::create($data);
        if($status)
        {
            return redirect()->route('category.index')->with('success','Category successfully created ');

        }
        else
        {
            return back()->with('error','Something went wrong');

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $parents_cat = Category::where('is_parent',1)->orderBy('title','ASC')->get();

        if($category){
            return view('Dashboard.categories.edit',compact(['category','parents_cat']));
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if($category){
            $this->validate($request,[
                'title'=>'string|required',
                'summary'=>'string|nullable',
                'is_parent'=>'sometimes|in:1',
                'parent_id'=>'nullable|exists:categories,id',
                'status'=>'nullable|in:active,inactive'
            ]);
            $data = $request->all();
            error_log("/**************************************".print_r($data));
    
            if($request->is_parent == 1)
            {
                $data['parent_id'] = null;
            }
            $data['is_parent'] = $request->input('is_parent','0');
            $status = $category->fill($data)->save();
            if($status)
            {
                return redirect()->route('category.index')->with('success','Category successfully updated ');
    
            }
            else
            {
                return back()->with('error','Something went wrong');
    
            }
    
          
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $child_id =Category::where('parent_id',$id)->pluck('id');
        if($category){
            $status = $category->delete();
            if($status){
                if(count($child_id) > 0) {
                    Category::shiftChild($child_id);
                }
                return redirect()->route('category.index')->with('success','Successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function getChildCategory($id)
    {
        $category = Category::find($id);
        if($category){
            $child_id = Category::getChild($id);
            if(count($child_id) <= 0)
            {
                return response()->json(['status'=>false ,'data'=>null, 'msg'=>'']);
            }
            else
            {
                return response()->json(['status'=>true ,'data'=>$child_id, 'msg'=>'']);
    
            }
    

        }
        else
        {
            return response()->json(['status'=>false ,'data'=>null, 'msg'=>'']);

        }
       

    }
}
