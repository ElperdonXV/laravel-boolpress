<?php

namespace App\Http\Controllers\Admin;
use App\Model\Post;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'desc')->paginate(20);

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validateData = $request->validate([
            'name'=> 'required|max:255',
        ]);

        $category = new Category();
        $category->fill($data);
        $category->slug = $category->createSlug($data['name']);
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category){
        return view('admin.categories.edit', ['category'=> $category]);
    }

    public function update(Request $request, Category $category){
        $data = $request->all();
        $categoryValidate = $request->validate(
            [
                'name' => 'required|max:240',
            ]
        );

        if ($data['name'] != $category->name) {
            $category->name = $data['name'];
            $category->slug = $category->createSlug($data['name']);
        }

        $category->update();
        return redirect()->route('admin.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}