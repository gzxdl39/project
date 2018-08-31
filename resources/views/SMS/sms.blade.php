<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>
</head>
<body>
	<p>手机号:&nbsp;&nbsp;&nbsp;
		<span>
			<input type="text" name="phone">
			<span id="ss">
				<a href="javascript:void(0)" class="btn btn-success" id="bb">单击发送</a>
			</span>
		</span>
	</p>
      输入校验码:<input type="text" name="code"><span></span>
      <input type='hidden' name="r_id" value="">
</body>
<script type="text/javascript">
alert($);
//获取按钮 绑定单击事件
// $("#bb").click(function(){
// 	o=$(this);
// 	p=$("input[name='phone']").val();
// 	//Ajax
// 	$.post("demo.php",{p:p},function(data){
// 		// alert(data.code);
// 		//判断状态值是否为000000
// 		if(data.code==000000){
// 			//按钮倒倒计时
// 			m=60;
// 			//定时器
// 			mytime=setInterval(function(){
// 				m--;
// 				//赋值给按钮
// 				o.html(m+"秒后重新发送");
// 				//按钮禁用
// 				o.attr('disabled',true);
// 				//判断
// 				if(m==0){
// 					//清除定时器
// 					clearInterval(mytime);
// 					//重新给按钮赋值
// 					o.html("重新发送");
// 					//激活按钮
// 					o.attr("disabled",false);

// 				}

// 			},1000);
// 		}
// 	},'json');
// });
// flag=false;
// //输入校验码
// $("input[name='code']").blur(function(){
// 	oo=$(this);
// 	//获取输入的校验码
// 	code=$(this).val();
// 	//Ajax
// 	$.get("code.php",{code:code},function(data){
// 		// alert(data);
// 		if(data==1){
// 			oo.next("span").css("color","green").html("校验码正确");
// 			flag=true;
// 		}else if(data==0){
// 			oo.next("span").css("color","red").html("校验码有误");
// 			flag=false;
// 		}else if(data==2){
// 			oo.next("span").css("color","red").html("校验码不能为空");
// 			flag=false;
// 		}else if(data==3){
// 			oo.next("span").css("color","red").html("校验码已经过期");
// 			flag=false;

// 		}
// 	});
// });

// //表单提交
// $("#ff").submit(function(){
// 	//让某个元素触发某类事件 trigger
// 	$("input[name='code']").trigger('blur');
// 	return flag;
// });
</script>
</html>