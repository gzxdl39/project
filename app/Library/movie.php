<?php
use  \Illuminate\Support\Facades\DB;

	function moive()
	{
		//友情链接
        $list=DB::table("home_lists")->where('status','=',2)->get();
        return $list;
	}
?>