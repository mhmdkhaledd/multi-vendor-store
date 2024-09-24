<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;
use function PHPUnit\Framework\returnArgument;


class CategoriesController extends Controller
{

    public function index()
    {
        if (Gate::denies('categories.view')){
            abort(403);
        }
          $request = request();

          $categories = category::with('parent')
              ->withCount('products')
              ->filter($request->all())
              ->paginate(6);

        return view('dashboard.categories.index',compact('categories'));
    }


    public function create()
    {
        if (Gate::denies('categories.create')){
            abort(403);
        }
        $parents = category::all();
        $category = new category();

        return view('dashboard.categories.create',compact('parents'));
    }


    public function store(Request $request)
    {
        if (Gate::denies('categories.create')){
            abort(403);
        }
        $request->validate(category::rules());

        //request merge
        $request->merge([
            'slug' => str::slug($request->post('name'))
        ]);

        $data = $request->except('image');
        $data['image'] =$this->uploadimage($request);

        $category = category::create($data);

        return redirect(route('dashboard.categories.index'))
            ->with('success','category created');
    }


    public function show(string $id)
    {
        if (Gate::denies('categories.view')){
            abort(403);
        }
    }


    public function edit(string $id)
    {
        if (Gate::denies('categories.update')){
            abort(403);
        }
        $category = category::findOrfail($id);

        $parents = category::where('id','!=',$id)
        ->where('parent_id','!=',$id)->get();

        return view('dashboard.categories.edit',compact('category','parents'));
    }


    public function update(Request $request, string $id)
    {
        if (Gate::denies('categories.update')){
            abort(403);
        }
        $request->validate(category::rules($id));

        $category=category::find($id);
        $old_image = $category->image;
        $data = $request->except('image');

        $data['image'] =$this->uploadimage($request);

       $category->update($data);
        if ($old_image && ($data['']))
            Storage::disk('public')->delete($old_image);

        return redirect(route('dashboard.categories.index'))
            ->with('success','category updated');
    }


    public function destroy(string $id)
    {
        if (Gate::denies('categories.delete')){
            abort(403);
        }
       $category=category::findOrfail($id);
       $category->delete();

        return redirect(route('dashboard.categories.index'))
            ->with('success','category deleted');
    }


    protected function uploadimage(Request $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');    //upload file obj
            $path = $file->store('uploads', 'public');

            return $path;
        }
    }

    public function trashed()
    {
         $categories = category::onlyTrashed()->paginate(4);
         return view('dashboard.categories.trashed',compact('categories'));
    }

    public function restore(Request $request,$id)
    {
        $category = category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('dashboard.categories.trashed')
            ->with('success','category restored!');
    }

    public function forcedelete ($id)
    {
        $category = category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        return redirect()->route('dashboard.categories.trashed')
            ->with('success','category deleted forever!');
    }
}


