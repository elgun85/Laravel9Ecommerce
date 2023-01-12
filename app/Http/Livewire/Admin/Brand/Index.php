<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
  public  $name,$status,$slug,$brand_id;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

/*  public function rules()
  {
      return
          [
              'name'=>'required|string|min:3|max:250',
              'status'=>'nullable'
          ];
  }
  public function resetInput()
  {
      $this->name =Null;
      $this->status =Null;
  }
    public function storeBrand()
    {
$validateData=$this->validate();

return Brand::create([
    'name'=>$this->name,
    'slug'=>Str::slug($this->name),
    'status'=>$this->status ==true ? '1' : '0',
]);
session()->flash('message','Brand Added Successfully');
$this->dispatchBrowserEvent('close-modal');
$this->resetInput();
    }



public function closeModal()
{
    $this->resetInput();
}
public function openModal()
{
    $this->resetInput();
}









    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand=Brand::findOrFail($brand_id);
        $this->name   = $brand->name;
        $this->slug   = Str::slug($brand->name);
        $this->status = $brand->status ==true ? '1' : '0';
    }

    public function updateBrand(int $brand_id)
    {
        $validateData=$this->validate();

        return Brand::findOrFail($this->brand_id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->name),
            'status'=>$this->status ==true ? '1' : '0',
        ]);
        session()->flash('message','Brand Updadet Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }*/


    public function render()
    {
        $brands=Brand::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.brand.index',compact('brands'));
    }
}
