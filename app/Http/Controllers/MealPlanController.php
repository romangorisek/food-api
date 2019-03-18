<?php

namespace App\Http\Controllers;

use App\Dish;
use App\MealPlan;
use Illuminate\Support\Facades\DB;

class MealPlanController
{
    public function get($week)
    {
        $mealPlan = new MealPlan;
        return $mealPlan->week($week, request('meal_id'));
    }

    public function create()
    {
        try {
            DB::transaction(function () {
                foreach (request('dish_ids') as $dishId) {
                    $data = [
                        'week' => request('week'),
                        'meal_id' => request('meal_id'),
                        'dish_id' => $dishId
                    ];
                    if (!$item = MealPlan::create($data)) {
                        throw new \Exception("Could not save meal plan.");
                    }
                    $dish = Dish::find($dishId);
                    $dish->last_used = new \DateTime();
                    $dish->save();
                }
            });
            return [
                "success" => true,
                "msg" => "Meal plan saved."
            ];
        } catch (\Exception $e) {
            return [
                "success" => false,
                "msg" => $e->getMessage()
            ];
        }
    }
}
