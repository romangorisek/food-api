<?php

namespace App;

use Illuminate\Support\Facades\DB;

class MealPlan extends Model
{
    protected $table = 'meal_plans';

    public function week($week, $mealId)
    {
        $mealPlan = $this->cachedMealPlan($week, $mealId);
        $cached = true;
        if ($mealPlan->isEmpty()) {
            $mealPlan = $this->mealPlanPropositon();
            $cached = false;
        }
        return ["dishes" => $mealPlan, "cached" => $cached];
    }

    private function cachedMealPlan($week, $mealId)
    {
        // $thisWeeksDishIds = $this->where('week', $week)->where('meal_id', $mealId)->orderBy('day_of_week')->pluck('dish_id')->toArray();
        // return Dish::whereIn('id', $thisWeeksDishIds)->get();

        return DB::table('meal_plans as MP')
                    ->join('dishes as D', 'MP.dish_id', '=', 'D.id')
                    ->select('D.*')
                    ->where('MP.week', $week)
                    ->where('MP.meal_id', $mealId)
                    ->orderBy('MP.day_of_week')
                    ->get();
    }

    private function mealPlanPropositon()
    {
        return Dish::inRandomOrder()->take(7)->get();
    }
}
