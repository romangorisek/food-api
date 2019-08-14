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
        $mealId = 'a6e9d279-0ff1-4a28-8b03-563967f00c6e'; //request('meal_id')
        return $mealPlan->week($week, $mealId);
    }

    public function random()
    {
        $dishIds = request("dish_ids");
        if ($dishIds) {
            return Dish::inRandomOrder()->whereNotIn('id', $dishIds)->first();
        } else {
            return Dish::inRandomOrder()->first();
        }
    }

    public function create()
    {
        try {
            DB::transaction(function () {
                MealPlan::where('week', request('week'))->where('meal_id', request('meal_id'))->delete();
                foreach (request('dish_ids') as $i => $dishId) {
                    $data = [
                        'week' => request('week'),
                        'day_of_week' => $i,
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

    public function delete()
    {
        try {
            MealPlan::where('week', request('week'))->where('meal_id', request('meal_id'))->delete();
            return [
                "success" => true,
                "msg" => "Meal plan removed."
            ];
        } catch (\Exception $e) {
            return [
                "success" => false,
                "msg" => $e->getMessage()
            ];
        }
    }
}
