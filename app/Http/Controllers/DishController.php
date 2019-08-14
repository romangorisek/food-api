<?php

namespace App\Http\Controllers;

use App\Dish;

class DishController extends CrudController
{
    protected $model = Dish::class;
    protected $fields = ['title', 'description', 'url', 'meal_id', 'last_used', 'season'];

    public function all()
    {
        $dishes = ($this->model)::with('ingredients');
        if(request('search')) {
            $dishes->where('title', 'like', '%' . request('search') . '%');
        }
        return $dishes->get();
    }
    
    public function create()
    {
        if ($item = ($this->model)::create(request($this->fields))) {
            $item->ingredients()->sync(request('ingredients'));
            return $item;
        }
        throw new \Exception("Item could not be created");
    }
    
    public function update($id)
    {
        $element = ($this->model)::find($id);
    
        if (!$element) {
            // throw item not found exception
        }
    
        if ($element->update(request($this->fields))) {
            $element->ingredients()->sync(request('ingredients'));
            return $element;
        }
        throw new \Exception("Item could not be updated");
    }
}
