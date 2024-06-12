<?php

namespace App\Livewire\CMS;

use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use App\Models\CMS\BlogTag;
use App\Utility\FileUploadUtility;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class BlogCreateUpdate extends Component
{
    use WithFileUploads, LivewireAlert;

    public $blog = [];
    public $tags = [];
    public $additional_files = [];

    public function mount($id = null)
    {
        if (isset($id)) {
            $this->blog = Blog::findOrFail($id)->toArray();
            $this->tags = Blog::findOrFail($id)->tags()->pluck('id')->toArray();
        }
    }

    public function render()
    {
        $blog_categories = BlogCategory::latest('id')->where('status', 1)->get();
        $blog_tags = BlogTag::latest('id')->where('status', 1)->get();
        if (isset($this->blog['id'])) {
            $old_blog = Blog::find($this->blog['id']);
            $old_tags = $old_blog->tags()->pluck('id')->toArray();
            if (count($old_tags) > 0) {
                $selected_tags = $old_tags;
            }
        }
        if (!isset($this->blog['priority'])) {
            $this->blog['priority'] = 0;
        }
        $blog_tag_array = array();
        foreach ($blog_tags as $blog_tag) {
            $blog_tag_array[$blog_tag->category->title ?? 'Default'][] = [
                'id' => $blog_tag->id,
                'title' => $blog_tag->title,
            ];
        }
        $data = [
            'page_title' => isset($this->blog['id']) ? 'Edit Blog' : 'Add Blog',
            'blog_categories' => $blog_categories,
            'blog_tags' => $blog_tag_array,
            'selected_tags' => $selected_tags ?? [],
        ];
        return view('livewire.c-m-s.blog-create-update', $data)->layout('layouts.app');
    }

    public function rules(): array
    {
        return [
            'blog.title' => 'required|min:3|string|max:190',
            'blog.category_id' => 'required|exists:blog_categories,id',
            'blog.content' => 'nullable',
            'blog.files' => 'nullable|array',
            'blog.priority' => 'required|numeric|min:0',
            'blog.short_description' => 'nullable',
            'blog.files.*' => 'sometimes|file',
            'blog.banner' => 'sometimes|image|max:1024|mimes:png,jpg,jpeg',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        DB::beginTransaction();
        try {
            $blog = $validated['blog'];
            if (isset($blog['banner']) && $blog['banner'] && !is_string($blog['banner'])) {
                $uploaded_file = FileUploadUtility::fileUploadLivewireRequest($blog['banner'], 'blog');
                $blog['banner'] = $uploaded_file;
            }
            $blog['author_id'] = auth()->user()->id;
            // Additional Files
            if (isset($blog['files']) && count($blog['files']) > 0) {
                $additional_files = $blog['files'];
                unset($blog['files']);
                if ($additional_files && count($additional_files)) {
                    foreach ($additional_files as $file) {
                        if (!is_string($file)) {
                            $uploaded_file = FileUploadUtility::fileUploadLivewireRequest($file, 'blog');
                            $blog['files'][] = $uploaded_file;
                        } else {
                            $blog['files'][] = $file;
                        }
                    }
                }
            }
            $blog = Blog::updateOrCreate([
                'id' => @$this->blog['id']
            ], $blog);
            $blog->tags()->sync($this->tags);
            DB::commit();
            $this->alert('success', 'Blog Saved Successfully!');
            return $this->redirect(route('blogs.index'));
        } catch (Throwable $throwable) {
            DB::rollBack();
            $this->alert('error', $throwable->getMessage());
        }
    }
}
