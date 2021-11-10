<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private function getCategory()
    {
        return Category::where([
            ['id_user', Auth::user()->id_user],
            ['deleted', false]
        ])->get();
    }

    public function findCategory($id)
    {
        return Category::where([
            ['id_user', '=', Auth::user()->id_user],
            ['id_category', '=', $id],
            ['deleted', false]
        ])->firstOrFail();
    }

    private function findCategoryWithList($id)
    {
        return [
            'category' => $this->findCategory($id),
            'categories' => $this->getCategory()
        ];
    }
    public function index()
    {
        return view('category.index', [
            'categories' => $this->getCategory()
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->all();
        $data['id_user'] = Auth::user()->id_user;

        if(!Category::create($data))
            return back()->withErrors('An error ocurred while created a new category '.$data['title'].'.');

        return back()->with('success', 'Your category '.$data['title'].' was created with success.');
    }

    public function edit(Request $request)
    {
        return view('category.edit', $this->findCategoryWithList($request->id));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $category = $this->findCategory($request->id_category);

        $category->fill($data);
        
        if(!$category->save())
            return back()->withErrors('An error ocurred while updated the category '.$category['title'].'.');

        return redirect('/category')->with('warning', 'Your category '.$category['title'].' was updated with success.');
    }

    public function delete(Request $request)
    {
        return view('category.delete', $this->findCategoryWithList($request->id));
    }

    public function destroy(Request $request)
    {
        $category = $this->findCategory($request->id_category);

        $category->deleted = true;
        $category->deleted_at = date("Y-m-d H:i:s");

        if(!$category->save())
            return redirect('/category')->withErrors('An error ocurred while deleted the category '.$category['title'].'.');

        return redirect('/category')->with('warning', 'Your category '.$category['title'].' was deleted with success.');
    }

}
