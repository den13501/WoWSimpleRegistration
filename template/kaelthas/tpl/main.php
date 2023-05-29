<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 11/26/2018 - 8:36 PM
 */
require_once 'header.php'; ?>
<div class="row">
    <div class="main-box">
        <div class="col-md-8" style="margin-top: 20px;">
            <div>
                <ul class="nav nav-tabs" style="display: none;">
                    <li><a data-toggle="tab" href="#pills-register" id="register"><?php elang('register'); ?></a></li>
                    <li><a data-toggle="tab" href="#pills-howtoconnect" id="howtoconnect"><?php elang('how_to_connect'); ?></a></li>
                    <?php if (!get_config('disable_online_players')) { ?>
                        <li><a data-toggle="tab" href="#pills-serverstatus" id="serverstatus"><?php elang('server_status'); ?><</a></li>
                    <?php }
                    if (!get_config('disable_top_players')) { ?>
                        <li><a data-toggle="tab" href="#pills-topplayers" id="topplayers"><?php elang('top_players'); ?></a></li>
                    <?php } ?>
                    <li><a data-toggle="tab" href="#pills-contact" id="contact"><?php elang('contact'); ?></a></li>
                </ul>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade in <?php echo((empty($error_error) && empty($success_msg)) ? 'active' : ''); ?>"
                         id="pills-main">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide1.jpg"
                                         alt="WoW" style="width:100%;">
                                </div>
                                <div class="item">
                                    <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide2.jpg"
                                         alt="WoW" style="width:100%;">
                                </div>
                                <div class="item">
                                    <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide3.jpg"
                                         alt="WoW" style="width:100%;">
                                </div>
                                <div class="item">
                                    <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide4.jpg"
                                         alt="WoW" style="width:100%;">
                                </div>                                
                            </div>
                        </div>
                        <?php require_once base_path . 'template/' . $antiXss->xss_clean(get_config("template")) . '/tpl/posts.php'; ?>
                    </div>
                    <div class="tab-pane fade in <?php echo(!(empty($error_error) && empty($success_msg)) ? 'active' : ''); ?>"
                         id="pills-register">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="" method="post">
                                    <div class="box1" style="margin-top: 0px;padding: 10px; font-size:16px">
                                        <?php error_msg();
                                        success_msg(); //Display message. ?>
                                        <div class="input-group">
                                            <span class="input-group"><?php elang('email'); ?></span>
                                            <input type="email" class="form-control" placeholder="<?php elang('email'); ?>" name="email">
                                        </div>
                                        <?php if (!get_config('battlenet_support')) { ?>
                                            <div class="input-group">
                                                <span class="input-group"><?php elang('username'); ?></span>
                                                <input type="text" class="form-control" placeholder="<?php elang('username'); ?>"
                                                       name="username">
                                            </div>
                                        <?php } ?>
                                        <div class="input-group">
                                            <span class="input-group"><?php elang('password'); ?></span>
                                            <input type="password" class="form-control" placeholder="<?php elang('password'); ?>"
                                                   name="password">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group"><?php elang('retype_password'); ?></span>
                                            <input type="password" class="form-control" placeholder="<?php elang('retype_password'); ?>"
                                                   name="repassword">
                                        </div>
                                        <?php echo GetCaptchaHTML();?>
                                        <input name="submit" type="hidden" value="register">
                                        <div class="text-center" style="margin-top: 10px;"><input type="submit"
                                                                                                  class="btn btn-success"
                                                                                                  value="<?php elang('register'); ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="box1 content_box1 style="font-size:16px">
                                    <?php require_once base_path . 'template/' . $antiXss->xss_clean(get_config("template")) . '/tpl/rules.php'; ?>
                                    <hr>
                                    <div class="text-center">
                                        <?php if (empty(get_config('disable_changepassword'))) { ?>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#changepassword-modal">
                                                <?php elang('change_password'); ?>
                                            </button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#restorepassword-modal">
                                            <?php elang('restore_password'); ?>
                                        </button>
                                    </div>
                                    <?php if (get_config('2fa_support')) { ?>
                                        <div class="text-center" data-aos="fade-up" data-aos-delay="100" style="margin-top: 5px;">
                                            <button type="button" class="btn btn-default" data-toggle="modal"
                                                    data-target="#e2fa-modal">
                                                <?php elang('two_factor_authentication'); ?>
                                            </button>
                                        </div>
                                        <div class="modal" id="e2fa-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php elang('two_factor_authentication'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                              method="post">
                                                            <div>
                                                                <ul>
                                                                    <li><?php elang('two_factor_authentication_tip1'); ?> <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" target="_blank">Google Store</a> - <a href="https://apps.apple.com/app/google-authenticator/id388497605" target="_blank">Apple Store</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('email'); ?></span>
                                                                <input type="email" class="form-control" placeholder="<?php elang('email'); ?>"
                                                                       name="email">
                                                            </div>
                                                            <?php if (empty(get_config('battlenet_support'))) { ?>
                                                                <div class="input-group">
                                                                    <span class="input-group"><?php elang('username'); ?></span>
                                                                    <input type="text" class="form-control" placeholder="<?php elang('username'); ?>"
                                                                           name="username">
                                                                </div>
                                                            <?php } echo GetCaptchaHTML();?>
                                                            <input name="submit" type="hidden" value="etfa">
                                                            <div class="text-center" style="margin-top: 10px;"><input
                                                                        type="submit"
                                                                        class="btn btn-primary"
                                                                        value="<?php elang('two_factor_authentication_enable'); ?>"></div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                            <?php elang('close'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } if (get_config('vote_system')) { ?>
                                        <div class="text-center" style="margin-top: 5px;">
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#vote-modal">
                                                <?php elang('vote_for_us'); ?>
                                            </button>
                                        </div>
                                        <div class="modal" id="vote-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php elang('vote'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                              method="post" target="_blank">
                                                            <?php if (get_config('battlenet_support')) { ?>
                                                                <div class="input-group">
                                                                    <span class="input-group"><?php elang('email'); ?></span>
                                                                    <input type="email" class="form-control"
                                                                           placeholder="<?php elang('email'); ?>"
                                                                           name="account">
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="input-group">
                                                                    <span class="input-group"><?php elang('username'); ?></span>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="<?php elang('username'); ?>"
                                                                           name="account">
                                                                </div>
                                                            <?php } ?>
                                                            <div class="text-center" style="margin-top: 10px;">
                                                                <?php
                                                                $vote_sites = get_config('vote_sites');
                                                                if (!empty($vote_sites)) {
                                                                    foreach ($vote_sites as $siteID => $vote_site) {
                                                                        $tmp_id = $siteID + 1;
                                                                        echo '<button type="submit" name="siteid" value="' . $tmp_id . '" style="border:none; background-color: transparent;"><img src="' . $vote_site['image'] . '"></button>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
                                                            <?php elang('close'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="modal" id="restorepassword-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php elang('restore_password'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <?php if (get_config('battlenet_support')) { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('email'); ?></span>
                                                                <input type="email" class="form-control"
                                                                       placeholder="<?php elang('email'); ?>"
                                                                       name="email">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('username'); ?></span>
                                                                <input type="text" class="form-control"
                                                                       placeholder="<?php elang('username'); ?>"
                                                                       name="username">
                                                            </div>
                                                        <?php }
                                                        echo GetCaptchaHTML();?>
                                                        <input name="submit" type="hidden" value="restorepassword">
                                                        <div class="text-center" style="margin-top: 10px;"><input
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                    value="<?php elang('restore_password'); ?>"></div>

                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <?php elang('close'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="changepassword-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php elang('change_password'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <?php if (get_config('battlenet_support')) { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('email'); ?></span>
                                                                <input type="email" class="form-control"
                                                                       placeholder="<?php elang('email'); ?>"
                                                                       name="email">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('username'); ?></span>
                                                                <input type="text" class="form-control"
                                                                       placeholder="<?php elang('username'); ?>"
                                                                       name="username">
                                                            </div>
                                                        <?php } ?>
                                                        <div class="input-group">
                                                            <span class="input-group"><?php elang('old_password'); ?></span>
                                                            <input type="password" class="form-control"
                                                                   placeholder="<?php elang('old_password'); ?>"
                                                                   name="old_password">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group"><?php elang('password'); ?></span>
                                                            <input type="password" class="form-control"
                                                                   placeholder="<?php elang('password'); ?>"
                                                                   name="password">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group"><?php elang('retype_password'); ?></span>
                                                            <input type="password" class="form-control"
                                                                   placeholder="<?php elang('retype_password'); ?>"
                                                                   name="repassword">
                                                        </div>
                                                        <?php echo GetCaptchaHTML();?>
                                                        <input name="submit" type="hidden" value="changepass">
                                                        <div class="text-center" style="margin-top: 10px;"><input
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                    value="<?php elang('change_password'); ?>"></div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">
                                                        <?php elang('close'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="pills-howtoconnect">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box1" style="margin-top: 0px;padding: 10px;text-align: left">
                                    <?php require_once base_path . 'template/' . $antiXss->xss_clean(get_config("template")) . '/tpl/howtoconnect.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!get_config('disable_online_players')) { ?>
                        <div class="tab-pane fade in" id="pills-serverstatus"  style="margin-top: -10px;"> <!--伺服器狀態，線上玩家及時顯示-->
                            <div class="box1" style="margin-top: 10px;">
                                <?php
                                foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                                    echo "<p><span style='color: #005cbf;font-weight: bold; font-size: 18px;'>{$onerealm['realmname']}</span> <span style='font-size: 16px;'>(" . lang('online_players_msg1') . " " . user::get_online_players_count($onerealm['realmid']) . ")</span></p><hr>";
                                    $online_chars = user::get_online_players($onerealm['realmid']);
                                    if (!is_array($online_chars)) {
                                        echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                                    } else {
                                        echo '<table style="font-size:16px" class="table table-dark"><thead><tr><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th></tr></thead><tbody>';
                                        foreach ($online_chars as $one_char) {
                                            echo '<tr><th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td></tr>';
                                        }
                                        echo '</table>';
                                    }
                                    echo "<hr>";
                                }
                                ?>
                            </div>
                        </div>
                    <?php }
										
                    if (!get_config('disable_top_players')) { ?>
                        <div class="tab-pane fade in" id="pills-topplayers" style="margin-top: -10px;"> <!--排行榜頁面 -->
                            <div class="box1" style="margin-top: 10px;">  <!-- 上半區塊-遊戲時間TOP排行榜-->
                                <?php
                                foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                                    $data2show = status::get_top_playtime($onerealm['realmid']); 
                                    if (!is_array($data2show)) { //如DB讀無資料則顯示無線上玩家
                                        echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                                    } else {
                                        echo '<table style="font-size:16px" class="table table-dark"><thead><tr><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('play_time') . '</th></tr></thead><tbody>';
                                        $m = 1;
                                        foreach ($data2show as $one_char) {
                                            if (empty($one_char['name'])) {
                                                continue;
                                            }
											echo '<tr><th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean(get_human_time_from_sec($one_char['played_time_total'])) . '</td></tr>';
                                        }
                                        echo '</table>';
                                    }
                                }
                                ?>
                            </div>

							<?php
							//軍階計算公式
							function calc_character_rank($honor_rank_points){
								$rank = 0;
								if($honor_rank_points <= 0){
									$rank = 0;
								}else{
									if($honor_rank_points < 100){
										$rank = 1;
									}
									else if($honor_rank_points > 2000 & $honor_rank_points < 5000 )
									{
										$rank = 2;
									}
									else if ($honor_rank_points > 5000 & $honor_rank_points < 10000 )
									{
										$rank = 3;
									}
									else if ($honor_rank_points > 10000 & $honor_rank_points < 15000 )
									{
										$rank = 4;
									}
									else if ($honor_rank_points > 15000 & $honor_rank_points < 20000 )
									{
										$rank = 5;
									}
									else if ($honor_rank_points > 20000 & $honor_rank_points < 25000 )
									{
										$rank = 6;
									}
									else if ($honor_rank_points > 25000 & $honor_rank_points < 30000 )
									{
										$rank = 7;
									}
									else if ($honor_rank_points > 30000 & $honor_rank_points < 35000 )
									{
										$rank = 8;
									}
									else if ($honor_rank_points > 35000 & $honor_rank_points < 40000 )
									{
										$rank = 9;
									}
									else if ($honor_rank_points > 40000 & $honor_rank_points < 45000 )
									{
										$rank = 10;
									}
									else if ($honor_rank_points > 45000 & $honor_rank_points < 50000 )
									{
										$rank = 11;
									}
									else if ($honor_rank_points > 50000 & $honor_rank_points < 55000 )
									{
										$rank = 12;
									}
									else if ($honor_rank_points > 55000 & $honor_rank_points < 60000 )
									{
										$rank = 13;
									}
									else if ($honor_rank_points > 60000)
									{
										$rank = 14;
									}									
									//else $rank = ceil($honor_rank_points / 1000) + 1;
								}
								//if($rank > 14) $rank = 14;
								return $rank;
							}
							?>

                            <div class="box1" style="margin-top: 5px;"> <!-- 下半區塊-榮譽排行榜-->
                                <?php
                                foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                                    $data2show = status::get_top_honorpoints($onerealm['realmid']); 
                                    if (!is_array($data2show)) { //如DB讀無資料則顯示無線上玩家
                                        echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                                    } else {
                                        //echo '<table style="font-size:16px" class="table table-dark"><thead><tr><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('honor_standing') . '</th><th scope="col">' . lang('pvp_rank') . '</th><th scope="col">' . lang('pvp_rank_highest') . '</th><th scope="col">'  . lang('honor_kills') . '</th><th scope="col">' . lang('honor_points') . '</th></tr></thead><tbody>';
                                        echo '<table style="font-size:16px" class="table table-dark"><thead><tr><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('honor_standing') . '</th><th scope="col">' . lang('pvp_rank') . '</th><th scope="col">'  . lang('honor_kills') . '</th><th scope="col">' . lang('honor_points') . '</th></tr></thead><tbody>';
										foreach ($data2show as $one_char) {
                                            if (empty($one_char['name'])) {
                                                continue;
                                            }
											$char_rank_id = calc_character_rank($one_char['honor_rank_points']); //從DB讀取榮譽點數後計算RANK
                                            //echo '<tr><th>' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['honor_standing']) . '</td><td>' . $antiXss->xss_clean($char_rank_id) . '</td><td>' . $antiXss->xss_clean($one_char['honor_highest_rank']) . '</td><td>' . $antiXss->xss_clean($one_char['honor_stored_hk']) . '</td><td>' . $antiXss->xss_clean($one_char['honor_rank_points']) . '</td></tr>';
											echo '<tr><th>' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['honor_standing']) . '</td><td>' . $antiXss->xss_clean($char_rank_id) . '</td><td>' . $antiXss->xss_clean($one_char['honor_stored_hk']) . '</td><td>' . $antiXss->xss_clean($one_char['honor_rank_points']) . '</td></tr>';
                                        }										
                                        echo '</table>';
                                    }
                                    echo "<hr>";
                                }
                                ?>
                            </div>
							
                        </div>
						
                    <?php } ?>
                    <div class="tab-pane fade in" id="pills-contact">
                        <div class="box1" style="margin-top: 0px;">
                            <?php require_once base_path . 'template/' . $antiXss->xss_clean(get_config("template")) . '/tpl/contactus.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 sidebar">
            <div class="box1" style="margin-top: 20px;font-size:16px">
                <p><?php elang('realmlist'); ?>: <span style="color: yellow;"><?php echo get_config('realmlist'); ?></span></p>
				<?php echo(!empty(get_config("game_version")) ? '<p>' . lang('game_version') . ': <a href="' . get_config("client_location") . '" style="color: yellow;">' . get_config("game_version") . '</a></p>' : ''); ?>
                <?php echo(!empty(get_config("patch_location")) ? '<p>' . lang('server_patch') . ' : <a href="' . get_config("patch_location") . '" style="color: yellow;">' . lang('download') . '</a></p>' : ''); ?>
				<?php echo(!empty(get_config("addon_tbc_location")) ? '<p>' . lang('tbc_addon') . ' : <a href="' . get_config("addon_tbc_location") . '" style="color: yellow;">' . lang('download') . '</a></p>' : ''); ?>
   				<?php echo(!empty(get_config("guide_url")) ? '<p>' . lang('guide') . ' : <a href="' . get_config("guide_url") . '" style="color: yellow;">' . lang('goto') . '</a></p>' : ''); ?>
            </div>
			<div class="box1" style="font-size:16px">
                Changelogs
                <hr style="border-color: #F1A40F;">
				<iframe src="template/kaelthas/tpl/changelog.html" width="330"			
                        height="300" allowtransparency="false" frameborder="0"></iframe>
            </div>
                <iframe src="https://discordapp.com/widget?id=XXXXXXXXXXXXX&theme=dark" width="350"			
                        height="360" allowtransparency="false" frameborder="0"></iframe>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
