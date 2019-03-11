<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CrudController extends Controller {

    public function __construct()
    {
        
    }

    public function all()
    {
        return ($this->model)::all();
    }

    public function get($id)
    {
        return ($this->model)::find($id);
    }

    public function create()
    {
        if ($item = ($this->model)::create(request($this->fields))) {
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
            return $element;
        }
        throw new \Exception("Item could not be updated");
    }
    
    public function delete($id)
    {
        $element = ($this->model)::find($id);

        if ($element && $element->delete()) {
            return [
                "success" => true,
                "msg" => "Item deleted"
            ];
        }
        return ["Item could not be deleted"];
    }
}