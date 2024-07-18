<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ModelUtility
{

    public static function generateQuery(Builder $query, array $params, $user = null)
    {
          if ($user) {
              $countryId = $user->country_id;
              $stateId = $user->state_id;
              $cityId = $user->city_id;
              $query->where(function ($query) use ($countryId, $stateId, $cityId) {
                  $query->where('country_id', $countryId)
                  ->Where('state_id', $stateId)
                  ->Where('city_id', $cityId);
                });
        }

        // Apply section filters
        if (isset($params['section'])) {
            switch ($params['section']) {
                case 'recent':
                    $query->whereDate('created_at', '=', Carbon::now()->startOfDay());
                    
                    break;
                case 'weekly':
                    $query->whereDate('created_at', '=',Carbon::now()->addDays(7));
                    break;
                case 'monthly':
                    $query->whereDate('created_at', '=', Carbon::now()->subMonth()->toDateString());
                    break;
                case 'anniversary':
                    $query->whereDate('created_at', '=', Carbon::now()->subYear()->toDateString());
                    break;
                default:
                    $query->whereDate('created_at', '=', Carbon::now()->startOfDay());
                    break;
            }
        } else {
            
            // $query->where('created_at', '>=', Carbon::now()->subDays(7));
            
        }
         
        // Apply sorting
        if (isset($params['AscDesc'])) {
            $query->orderBy('created_at', $params['AscDesc']);
        } elseif (isset($params['NameAscDesc'])) {
            $query->orderBy('frist_name', $params['NameAscDesc']);
        }else{
            $query->orderBy('created_at', 'DESC');
            // dd($query);
        }

        // Apply search filters
        if (isset($params['searchName'])) {
            $searchTerm = $params['searchName'];
            $query->where(function ($query) use ($searchTerm) {
                $query->where('frist_name', 'like',  $searchTerm . '%')
                    ->orWhere('last_name', 'like',  $searchTerm . '%');
            });
        }

        // Apply location filters
        if (isset($params['location'])) {
            $locationsArray = explode(',', $params['location']);
            
            $query->where(function ($query) use ($locationsArray,) {
                $length = count($locationsArray);
                if($length==1){
                    $query->where('country_id', $locationsArray[0]);
                }elseif($length==2){
                    $query->where('state_id', $locationsArray[1]);
                }else{
                    $query->where('city_id', $locationsArray[2]);
                }
            });
        }
        return $query;
    }

}
