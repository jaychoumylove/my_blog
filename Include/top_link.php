        <div class="top_link">
            <div class="link_content">
                <div class="link_left">
                    欢迎来到优购户外商城！
                </div>
                <div class="link_right">
                    <div>
                    	<? if(@$_SESSION['user']==""){?>
						请
                        <a href="YG_login.php" target="_blank">登录</a>
                        <a href="YG_register.php" target="_blank">注册有惊喜！</a>
                        <? }else{?>
                        <a href="YG_user.php" target="_blank"><? echo $_SESSION['user']?><img class="xial" src="images/xl.png" alt="..."/></a>
                        <ul>
                            <li><a href="YG_login_deal.php?act=switch" target="_blank">切换用户</a></li>
                            <li><a href="YG_login_deal.php?act=cancellation" target="_blank">注销</a></li>
                        </ul>
						<? }?>
                        <!--请
                        <a href="#" target="_blank">登录</a>
                        <a href="#" target="_blank">注册有惊喜！</a>
                        
                        -->
                    </div>
                    <div>
                        <a href="YG_user_order.php?user=<? echo $_SESSION["user"]?>" target="_blank">我的订单<img class="xial" src="images/xl.png" alt="我的订单"/></a>
                        <ul>
                            <li><a href="YG_user_order.php" target="_blank">所有订单</a></li>
                            <li><a href="YG_user_order.php" target="_blank">待发货</a></li>
                            <li><a href="YG_user_order.php" target="_blank">待收货</a></li>
                            <li><a href="YG_user_order.php" target="_blank">待评论</a></li>
                        </ul>
                    </div>
                    <div>
                        <a href="YG_user_collection.php" target="_blank">我的收藏</a>
                    </div>
                    <div class="YG_lx">
                        优购微信<img class="xial" src="images/xl.png" alt="..."/>
                        <div class="YG_wc"><img id="wx_xl" src="images/YG_ewm.png" alt="优购微信"></div>
                    </div>
                    <div>
                        优购导航<img class="xial" src="images/xl.png" alt="优购导航"/>
                        <ul>
                            <li><a href="YG_products.php" target="_blank">产品中心</a></li>
                            <li><a href="YG_newsllist.php" target="_blank">咨询中心</a></li>
                            <li><a href="YG_newsllist.php" target="_blank">帮助中心</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>