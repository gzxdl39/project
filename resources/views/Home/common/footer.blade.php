 </div>
    <!--end of left content--> 
    <div class="right_content"> 
     <div class="languages_box"> 
      <span class="red">语言:</span> 
      <a href="#" class="selected"><img src="/static/images/gb.gif" alt="" title="" border="0" /></a> 
      <a href="#"><img src="/static/images/fr.gif" alt="" title="" border="0" /></a> 
      <a href="#"><img src="/static/images/de.gif" alt="" title="" border="0" /></a> 
     </div> 
     <div class="currency"> 
      <span class="red">货币: </span> 
      <a href="#">欧元</a> 
      <a href="#">英镑</a> 
      <a href="#" class="selected">人民币</a> 
     </div> 
     <div class="cart"> 
      <div class="title">
       <span class="title_icon"><img src="/static/images/cart.gif" alt="" title="" /></span>我的书籍
      </div> 
     </div> 
     <div class="title">
      <span class="title_icon"><img src="/static/images/bullet3.gif" alt="" title="" /></span>关于我们
     </div> 
     <div class="about"> 
      <p> <img src="/static/images/about.gif" alt="" title="" class="right" />春日去而复来，羞涩得到释放，

      有人收获了温润的唇，整颗心都被一个名字入侵。

      确凿的爱，会为心有所属的人，积蓄强力。

      假若真爱迟迟未来，也不必着急。

      懂得爱的人会先懂得取悦自己，

      王尔德曾说“爱自己是终身浪漫的开始”。

      方所情人节精选：不确定的年代，确定的你

      一份贴近内心的礼物，让爱情有迹可循。</p> 
     </div> 
<!--      <div class="right_box"> 
      <div class="title">
       <span class="title_icon"><img src="/static/images/bullet4.gif" alt="" title="" /></span>促销
      </div> 
      <div class="new_prod_box"> 
       <a href="details.html">产品名称</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/promo_icon.gif" alt="" title="" /></span> 
        <a href="details.html"><img src="/static/images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
      <div class="new_prod_box"> 
       <a href="details.html">产品名称</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/promo_icon.gif" alt="" title="" /></span> 
        <a href="details.html"><img src="/static/images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
      <div class="new_prod_box"> 
       <a href="details.html">产品名称</a> 
       <div class="new_prod_bg"> 
        <span class="new_icon"><img src="/static/images/promo_icon.gif" alt="" title="" /></span> 
        <a href="details.html"><img src="/static/images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a> 
       </div> 
      </div> 
     </div>  -->
     <div class="right_box"> 
      <div class="title">
      </div> 
      <div class="title">
       <span class="title_icon"><img src="/static/images/bullet6.gif" alt="" title="" /></span>友情链接
      </div> 
      <ul class="list"> 
        @foreach($movie as $row)
       <li><a href="{{$row->url}}">{{$row->title}}</a></li> 
       @endforeach
      </ul> 
     </div> 
    </div>
    <!--end of right content--> 
    <div class="clear"></div> 
  
   <!--end of center content--> 
   <div class="footer"> 
    <div class="left_footer">
     <img src="/static/images/footer_logo.gif" alt="" title="" />
     <br /> 
     <a href="http://www.cssmoban.com/" title="free templates">cssmoban</a>
    </div> 
    <div class="right_footer"> 
     <a href="#">首页</a> 
     <a href="/lists">友情链接</a>
     <a href="#">关于我们</a> 
     <a href="#">服务</a> 
     <a href="#">隐私政策</a> 
     <a href="#">联系我们</a> 
    </div> 
   </div> 
  </div>  
 </body>
</html>