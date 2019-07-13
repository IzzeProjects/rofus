<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Models\News;
use App\Http\Models\News\Category;
use App\Http\Requests\News\Categories\StoreCategory;
use App\Http\Requests\News\Categories\UpdateCategory;
use App\Http\Requests\News\StoreNews;
use App\Http\Requests\News\UpdateNews;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{


    private $category;

    /**
     * NewsController constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->category
            ->orderBy('id', 'desc')
            ->search($request->input('search'), ['name', 'id'])
            ->paginate(15);
        return view('admin.pages.news.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategory $request)
    {
        $category = $this->category->fill($request->all());
        $category->save();
        $category->slug = Str::slug($category->name . '-' . $category->id, '-');
        $category->save();

        return redirect()->route('admin.news.categories.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.pages.news.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategory $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = Str::slug($category->name . '-' . $category->id, '-');
        $category->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

}
