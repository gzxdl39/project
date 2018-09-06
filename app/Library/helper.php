<?php
use Illuminate\Support\Facades\Cookie;

	//发送短信校验码
	function sendsphone($p){
		//初始化必填
		//填写在开发者控制台首页上的Account Sid
		$options['accountsid']='858a15c09557124abd959be65b3b8ffe';
		//填写在开发者控制台首页上的Auth Token
		$options['token']='f8faf3bb4c146f124e28c87026fc67e7';

		//初始化 $options必填
		$ucpass = new Ucpaas($options);
		$appid = "ee477e285cc14a9eaa7f2ba1212554ef";	//应用的ID，可在开发者控制台内的短信产品下查看
		$templateid = "360100";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
		$param = rand(1000,9999); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
		$mobile = $p;
		$uid = "";
		// session(['param'=>$param]);
		Cookie::queue('param',$param,1);

		//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

		echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
		
	}
 ?>