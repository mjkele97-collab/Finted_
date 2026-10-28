<?php

namespace App\Livewire\Revisor;

use App\Models\Article;
use Livewire\Component;

class RejectedArticles extends Component
{
    public $search = '';

    public function restore($articleId)
    {
        $article = Article::where('is_accepted', false)
            ->findOrFail($articleId);

        $article->setAccepted(true);
        session()->flash('rejected_articles_message', __('ui.articolo-ripristinato', ['title' => $article->title]));
    }

    public function destroy($articleId)
    {
        $article = Article::where('is_accepted', false)
            ->findOrFail($articleId);

        $article->delete();
    }

    public function render()
    {
        $rejected_articles = Article::where('is_accepted', false)
            ->with('category')
            ->where(function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('body', 'like', '%'.$this->search.'%')
                    ->orWhereHas('category', function ($categoryQuery) {
                        $categoryQuery->where(
                            'name',
                            'like',
                            '%'.$this->search.'%'
                        );
                    });
            })
            ->latest()
            ->get();

        return view('livewire.revisor.rejected-articles', [
            'rejected_articles' => $rejected_articles,
        ]);
    }
}
