<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoru_id;
    public function deleteCategory($category_id)
    {
        $this->category_id=$category_id;
    }

    public function render()
    {

        $categories=Category::orderBy('id','DESC')->paginate(5);

        return view('livewire.admin.category.index',compact('categories'));
    }
}
