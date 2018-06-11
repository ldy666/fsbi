<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $all_dishes=DB::table('taoyst_orders')->get();

        $time7= $mytime=mktime(0, 0, 0, date('m'), date('d')-7, date('Y'));

        $time30= mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));;

        for($a=0;$a<count($all_dishes);$a++){
            if($time7<strtotime($all_dishes[$a]->order_created_at)){
                var_dump($all_dishes[$a]);
            };
            if($time30<strtotime($all_dishes[$a]->order_created_at)){
                var_dump($all_dishes[$a]);
            };
        }

        die;

        $all_dishes=DB::table('taoyst_orders')->get();
        $caidan = array();
        for($i=0;$i<count($all_dishes);$i++) {
            array_push($caidan,['name'=>$all_dishes[$i]->order_food_name,'num'=>1]);
            for($j=0;$j<$i;$j++){
                if($caidan[$j]['name']==$all_dishes[$i]->order_food_name){
                    $caidan[$j]['num']++;
                    //array_splice($caidan,$i+1,1);    //?????
                }
            }
        }
        var_dump($caidan);

    }
}
