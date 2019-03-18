<?php

namespace App;

class MealPlan extends Model
{
    protected static $tableName = 'meal_plans';

    public function week($week, $mealId)
    {
        $mealPlan = $this->cachedMealPlan($week, $mealId);
        if (!$mealPlan) {
            $mealPlan = $this->mealPlanPropositon();
        }
        return $mealPlan;
    }

    private function cachedMealPlan($week, $mealId)
    {
        $thisWeeksDishIds = $this->where('week', $week)->where('meal_id', $mealId)->orderBy('created_at')->pluck('dish_id')->toArray();
        return Dish::whereIn('id', $thisWeeksDishIds)->get();
    }

    private function mealPlanPropositon()
    {
        $monToSat = Dish::orderBy('last_used')->take(6)->get();
        $sun = Dish::where('id', 'nedeljsko')->get();
        return $monToSat->merge($sun);
    }
}
