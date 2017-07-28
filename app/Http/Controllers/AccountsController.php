<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class AccountsController extends Controller
{
    function getAllParents(){
        $data = DB::table('classes')->whereNull('parent_id')->orderBy('code','asc')->get();
        return response()->json($data);
    }
    function mainHeadsAsSelect(){
        $data = DB::table('classes')->select('code as key','id as value','account as text')
                                    ->whereNull('parent_id')
                                    ->orderBy('code','asc')
                                    ->get();
         return response()->json($data);

    }
    function getAllSeconds(){
        $where = array('c1.type' => 1, 'c1.parent_type' => NULL);
		
        $data = DB::table('classes as c1')->select('*','c1.account as parentHead')
                                    ->join('classes as c2','c2.parent_id','=','c1.id')
                                    ->where($where)
                                    ->orderBy('c2.code','asc')
                                    ->get();
        return response()->json($data);

    }
    function getAllThird(){
        $where = array('c1.type' => 2, 'c1.parent_type' => 1);
		
        $data = DB::table('classes as c1')->select('*','c1.account as parentHead')
                                    ->join('classes as c2','c2.parent_id','=','c1.id')
                                    ->where($where)
                                    ->orderBy('c2.code','asc')
                                    ->get();
        return response()->json($data);

    }
    function getCode($id){
			//print_r($row->code);
			$row = DB::table('classes')->where('parent_id',$id)->orderBy('id','desc');
    			if($row->count() > 0){
				$code = $row->first()->code;
			$pcode = explode('-', $code);
			$last =  end($pcode);
			}else{
				$last = 0;
			}
			$last = $last + 1;
			$last = ($last <= 9) ? sprintf("%02d",$last) : $last;

			//echo $last;

			$parentCode = DB::table('classes')->where('id',$id)->first()->code;
			$response = $parentCode."-".$last;
			echo $response;
    }
    function saveAccount(){
       DB::table('classes')->insert($_POST);
       $response = ['success' => 'ok', 'msg' => 'Account Added Successfully'];
       return response()->json($response);
    }
    function changeAccountStatus($id,$status){
        DB::table('classes')->where('id',$id)->update(['status' => $status]);
        $response = ['success' => 'ok', 'msg' => 'status updated !'];
        return response()->json($response);
    }
    function deleteAccount($id){
        DB::table('classes')->delete($id);
         $response = ['success' => 'ok', 'msg' => 'Account Deleted !'];
        return response()->json($response);
    }
    function getAllSub($id){
        $data = DB::table('classes')->select('account as text','id as value','code as key')->where('parent_id',$id)->get();
        return response()->json($data);
    }
}
