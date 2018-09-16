@extends('Home.common.base')
@section('title','留言') 
@section('content')
<script type="text/javascript" src="/admin/js/libs/jquery-1.8.3.min.js"></script>    
     <div class="center_content">
        <div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>联系我们</div>        
            <div class="feat_prod_box_details">
            <p class="details">读书使人充实，讨论使人机智，笔记使人准确，读史使人明智，读诗使人灵秀，数学使人周密，科学使人深刻，伦理使人庄重，逻辑修辞使人善辩。凡有所学，皆成性格。 —— 培根
读书时要深思多问。只读而不想，就可能人云亦云，沦为书本的奴隶；或者走马看花，所获甚微。 —— 王梓坤
文人作文，农人掘锄，本是平平常常的，若照相之际，文人偏要装做粗人，玩什么“荷锄带笠图”；农夫则在柳下捧一本书，装作“深柳读书图”之类，就要令人肉麻。 —— 鲁迅
            </p> 
            @if(session('success')) 
                <div id="span">{{session('success')}}</div>  
            @endif  
            @if(session('error')) 
                <div id="span">{{session('error')}}</div>  
            @endif   
                <div class="contact_form">
                <div class="form_subtitle">请输入留言信息</div>   <form action="/contact/create" method="post" id="myform" name="myform" enctype="multipart/form-data">        
                  <div class="form_row"> 
                       <label class="contact"><strong>用户名:</strong></label> 
                       <input type="text" class="contact_input" name="name" value="{{session('name')}}" /> <span></span>
                  </div> 

                  <div class="form_row"> 
                       <label class="contact"><strong>电话:</strong></label> 
                       <input type="text" class="contact_input" name="phone" /> <span></span>
                  </div> 
                                       
                  <div class="form_row"> 
                       <label class="contact"><strong>留言:</strong></label><br><br> 
                       <textarea rows="6" cols="40" type="text" class="contact_input" name="content"></textarea> <span></span>
                  </div>                   
                  <div class="form_row"> 
                        {{csrf_field()}} 
                        <input type="submit" class="btn btn-primary" value="提交" /> 
                  </div> 
                    </form>      
                </div>  
           </div>     
        <div class="clear"></div>
        </div><!--end of left content-->
 <script type="text/javascript">
        NAME=false;
        TEL=false;
        CONTENT=false;
       //用户名
       $("input[name='name']").blur(function(){
        //$(this)在Ajax里解析不了
        o=$(this);
        //获取用户名
        m=$(this).val();
        //正则匹配
        if(m.match(/^[a-zA-Z0-9_-]{4,16}$/)==null){
          $(this).next("span").css("color","red").html("用户名必须为4-16位任意的数字字母下划线");
          $(this).addClass("cur");
          NAME=false;
        }else{
          NAME=true;
        }
       });
         //电话
       $("input[name='phone']").blur(function(){
          o=$(this);
          //获取电话
          p=$(this).val();
            if(p.match(/(?:^1[3456789]|^9[28])\d{9}$/)==null){
                $(this).next("span").css("color","red").html("请输入正确手机号码");
                $(this).addClass("cur");
                TEL=false;
            }else{
                TEL=true;
          }
        });
        //留言内容
       $("textarea[name='content']").blur(function(){
          //获取内容
          p=$(this).val();
            if(p.match(/^[\u4e00-\u9fa5_a-zA-Z0-9]+$/)==null){
                $(this).next("span").css("color","red").html("请输入正确留言内容");
                $(this).addClass("cur");
                CONTENT=false;
            }else{
                $(this).next("span").css("color","green").html("留言内容正确");
                //清空样式
                $(this).removeClass("cur");
                //添加样式
                $(this).addClass("curs");
                CONTENT=true;
            }
       });
       //绑定事件
        a = $("#span").html();
        // 使用正则判断
        if(a.match(/\S/)==null){
          
        }else{
          alert(a);
        }
        //给form 绑定提交事件
        $("#myform").submit(function(){
        //在每个匹配的元素上触发某类事件
            $("input").trigger("blur");
            if(NAME && TEL && CONTENT){
                //提交表单
                return true;
            }else{
                return false;
            }
       });
    </script>   
@endsection