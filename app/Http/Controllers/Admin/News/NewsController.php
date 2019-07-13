<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Models\News;
use App\Http\Models\News\Category;
use App\Http\Requests\News\StoreNews;
use App\Http\Requests\News\UpdateNews;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    private $news;

    private $category;

    /**
     * NewsController constructor.
     * @param News $news
     * @param Category $category
     */
    public function __construct(News $news, Category $category)
    {
        $this->news = $news;
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
        $news = $this->news
            ->orderBy('id', 'desc')
            ->search($request->input('search'), ['title', 'id', 'author'])
            ->paginate(15);
        return view('admin.pages.news.index', compact('news'));
    }

    /**rofusDev@localhost
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all();
        return view('admin.pages.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNews $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNews $request)
    {
        $news = $this->news->fill($request->all());
        $news->save();
        $news->slug = Str::slug($news->title . '-' . $news->id, '-');
        $news->save();
        return redirect()->route('admin.news.edit', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(News $news)
    {
        $categories = $this->category->all();
        return view('admin.pages.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews $request
     * @param  News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNews $request, News $news)
    {
        $news->fill($request->all());
        $news->slug = Str::slug($news->title . '-' . $news->id, '-');
        $news->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Response
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back();
    }

}
