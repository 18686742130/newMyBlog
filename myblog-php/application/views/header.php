<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
    <div id="OSC_Banner">
        <div id="OSC_Slogon">博客之家</div>
        <div id="OSC_Channels">
                <a style="text-decoration:none;color:white" href="user/userSettings" class="project dianji" title="点击设置心情"><?php
                    $user = $this->session->userdata('user');
                    if($user){
                        if($user->smile){
                            echo $user->smile;
                        }else{
                            echo "点此设置心情";
                        }
                    }else{
                        echo "点此设置心情";
                    }
                    ?></a>
        </div>
        <div class="clear"></div>
    </div><!-- #EndLibraryItem --><div id="OSC_Topbar">
        <div id="VisitorInfo">
            当前访客身份：<span id="shenfen"><?php
            if($user){
                echo $user->username;
            }else{
                echo "游客";
            }
            ?></span>
            <?php
             if($user){
            ?>
                 [ <a href="user/logout">退出</a>  ]
            <?php
             }else{
            ?>
                 [ <a href="user/login">登录</a> | <a href="user/register">注册</a> ]
            <?php
             }
            ?>
				<span id="OSC_Notification">
			<a href="user/inbox" class="msgbox dianji" title="进入我的留言箱">你有<?php
                $newly = $this->session->userdata('newly');
                if($newly){
                    echo count($newly);
                }else{
                    echo "0";
                }
                ?>条新留言</a>
					</span>
        </div>
        <div id="SearchBar">
            <form action="Search">
                <input name="user" value="154693" type="hidden">
                <input id="txt_q" name="q" class="SERACH" placeholder="在此空间内搜索" type="text">
                <input class="SUBMIT" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
