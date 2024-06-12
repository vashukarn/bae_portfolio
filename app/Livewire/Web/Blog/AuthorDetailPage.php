<?php

namespace App\Livewire\Web\Blog;

use App\Models\CMS\Blog;
use Livewire\Component;

class AuthorDetailPage extends Component
{
    public $id;
    public int $per_page = 6;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $all_blogs = Blog::where('author_id', $this->id)->paginate($this->per_page);
        $data = [
            'all_blogs' => $all_blogs,
        ];
        return view('livewire.web.blog.author-detail-page', $data);
    }

    public function loadMore(): void
    {
        $this->per_page += 5;
    }
}
