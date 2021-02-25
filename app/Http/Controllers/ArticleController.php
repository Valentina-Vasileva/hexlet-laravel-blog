<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $flash = $request->session()->get('status', null);
        $articles = Article::paginate();
        return view('article.index', compact('articles', 'flash'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();

        $article = new Article();
        $article->fill($data);
        $article->save();
        $request->session()->flash('status', 'Article has been created!');
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article', 'id'));
    }

    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();

        $article->fill($data);
        $article->save();
        $request->session()->flash('status', 'Article has been updated!');
        return redirect()->route('articles.index');
    }

    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
        }
        $request->session()->flash('status', 'Article has been deleted!');
        return redirect()->route('articles.index');
    }

}
