<?php
$loged_In_user_id = $this->session->userdata("loginuserID");

if($this->session->userdata('loggedin')) {
    $user_type = $this->session->userdata("user_type");
    $workUrl = '';
    if ($user_type == '1') {
        $workUrl = 'work/student';
    } else {
        $workUrl = 'work/script/' . $loged_In_user_id;
    }
}
?>
<style>
     body, html {
         height: 100%;
         margin: 0;
     }
    .background_image {
        position: absolute;
        top: 0;left: 0;
        width:100%;height:136.47%;
        background-size: contain;
        z-index: -1;
    }

    .hdmenu{ position: absolute; left: 69.32%; top: 1%; width: 18%; height: 8.8%; }
    .hdmenu img{ width: 100%; height: 100% }
    .hdmenu a{ display: block; position: absolute; cursor: pointer}

    .exit-btn{ position: absolute; left: 87.9%; top: 2.78%; width: 5.31%; height: 4.81%; }
    .exit-btn img{ width: 100%; height: 100% }

    .back-btn{ position: absolute; left: 93.84%; top: 1.37%; width: 4.31%; height: 7.8%; }
    .back-btn img{ width: 100%; height: 100% }

     .avatar-frame{ position: absolute; left: 1.93%; top: 12.59%; width: 11.35%; height: 30.65%; }
     .avatar-frame img{ width: 100%; height: 100%; z-index: 2; }
     .avatar-frame img.avatar-img{ position:absolute; left: 10%; top: 22%; width: 80%; height: 57%; z-index: 1}
     .avatar-frame label.user-name{ position: absolute; left: 45%; top: 77%; width: 45%; height: 7%; color: #fff}
     .avatar-frame label.school-name{ position: absolute; left: 45%; top: 87%; width: 45%; height: 7%; color: #fff; }

     .script-title{ position: absolute; left: 21.15%; top: 15.68%; width: 60.10%; height: 10%}
     .script-title h1{ font-family:'Arial Normal', 'Arial';font-weight: bold;color: #ed4431; }
     .script-content{ position: absolute; left: 21.15%; top: 25.68%; width: 60.10%; height: 54.70%}

     .comment-write{ position: absolute; left: 20.36%; top: 84.41%; width: 61.92%; height: 18.53%; }
     .comment-write img{ width: 100%; height: 100% }
     .comment-write textarea{ position: absolute; font-size: 20px; left: 1%; top: 8%; width: 97%; height: 90%; border: none; box-shadow: none; resize: none}
     .comment-write textarea:hover{ border: none; box-shadow: none; }
     .comment-write textarea:focus{ border: none; box-shadow: none; }

     .like-btn{ position: absolute; left: 69.01%; top: 103.43%; width: 2.13%; height: 4.02%; }
     .like-btn img{ width: 100%; height: 100% }

     .like-count{ position: absolute; left: 71.5%; top: 104%; width: 1.8%; height: 3%; }
     .like-count label{ border-radius: 20px; background-color: #1ac1eb; padding: 2px 10px; font-size: 1.1em; color: #fff}

     .comment-btn{ position: absolute; left: 74.27%; top: 103.43%; width: 7.86%; height: 4.02%; }
     .comment-btn img{ width: 100%; height: 100% }

     .comment-list{ position: absolute; left: 21.35%; top: 109.98%; width: 59.89%; height: 23%; }
     #totalCommentArea{ height: 100%; overflow: auto; }
     .comment_item_area{
         margin-top: 10px;
         margin-bottom: 20px;
         padding-bottom: 10px;
         border-bottom-style:dashed;
         border-bottom-width: 1px;

     }
     .comment_item_area p{
         font-size:1.3em;
         margin: 0;
     }
     .scriptwork-content{
         font-weight: 700;
         font-style: normal;
         font-size: 22px;
         font-family: "Arial";
         padding-left:20px;
         margin-bottom: 20px;
     }

</style>
<input type="hidden" id="base_url" value="<?= base_url()?>">

<div class="bg">
    <img src="<?= base_url('assets/images/frontend/community/script/bg.png')?>" class="background_image">
</div>
<div class="hdmenu">
    <?php if($this->session->userdata("loggedin") != FALSE): ?>
        <div style="position: relative; height: 100%">
            <img class = "hdmenu_img" src="<?= base_url('assets/images/frontend/coursewares/hdmenu_normal.png')?>">
            <a id = "hdmenu_studentwork" href="<?= base_url($workUrl);?>" style="top: 27.2%; left: 1.1%; width: 31.9%; height: 48.5%;"></a>
            <a id = "hdmenu_profile" href="<?= base_url().'users/profile/'.$loged_In_user_id;?>" style="top: 3.9%; left: 37.1%; width: 26.1%; height: 90.4%;"></a>
            <a id = "hdmenu_community" href="<?= base_url().'community/index';?>" style="top: 27.2%; left: 67%; width: 31.9%; height: 48.5%;"></a>
        </div>
    <?php endif; ?>
</div>

<div class="exit-btn">
    <?php if($this->session->userdata("loggedin") == FALSE): ?>
        <a href="<?= base_url('signin/index')?>">
            <img src="<?= base_url('assets/images/frontend/coursewares/register.png')?>"></a>
    <?php else: ?>
        <a href="<?= base_url('signin/signout')?>">
            <img class="exit_btn_img" src="<?= base_url('assets/images/frontend/coursewares/exit.png')?>"></a>
    <?php endif; ?>
</div>

<div class="back-btn">
    <a href="<?= base_url() . 'community/index'?>">
        <img id ="back-btn-img" src="<?= base_url('assets/images/frontend/studentwork/back.png')?>">
    </a>
</div>

<div class="avatar-frame">
    <div style="position: relative; height: 100%">
        <img src="<?= base_url().'assets/images/frontend/contents-profile.png'?>" class="avatar-img" style="z-index: -1">
        <img src="<?= base_url('assets/images/frontend/community/script/avatar_frame.png')?>">
        <label class="user-name"><?= $user_nickname;?></label>
        <label class="school-name"><?= $user_school;?></label>
    </div>
</div>

<div class="script-title">
    <div style="text-align: center;">
        <h1><?php echo $content_title; ?></h1>
    </div>
</div>

<div class="script-content">
    <div style="height: 100%; overflow: auto">
        <div class="col-md-offset-1 col-md-10">
            <?php if($content_type_id=='1') { ?>
                <?php foreach ($scriptText as $scripttext):
                    echo '<p class="scriptwork-content">' . $scripttext . '</p>';
                endforeach;
            }else if($content_type_id=='2'){?>
                <?php foreach ($scriptText as $scripttext):
                    echo '<p style="font-size: 20px;">' . $scripttext . '</p>';
                endforeach;
            }else if($content_type_id=='3'){?>
                <div style="text-align: center;">
                    <img src="<?= base_url().$headImagePath;?>" height="580">
                </div>
            <?}else if($content_type_id=='4'){
                ?>
            <?php }?>
        </div>
    </div>
</div>

<div class="comment-write">
    <div style="position: relative; height: 100%">
        <img src="<?= base_url('assets/images/frontend/community/script/comment_write_bg.png')?>">
        <textarea class="form-control" rows="3" id="comment"></textarea>
    </div>
</div>

<div class="like-btn">
    <a id="vote_btn"><img src="<?= base_url('assets/images/frontend/community/script/like_btn.png')?>"></a>
</div>

<div class="like-count">
    <label id="vote_number_lbl"><?= $vote_num; ?></label>
</div>

<div class="comment-btn">
    <a id = "addOnComment"><img src="<?= base_url('assets/images/frontend/community/script/comment_btn.png')?>"></a>
</div>

<div class="comment-list">
    <div class="" id="totalCommentArea" style="text-align: left;">
        <?php foreach ($commentSets as $comemntItem):?>
            <div class="comment_item_area">
                <p style="font-weight: bold"><?php echo $comemntItem->fullname?></p>
                <p style=""><?php echo $comemntItem->comment_desc;?></p>
            </div>
        <?php endforeach;?>
    </div>
</div>

<script>
    window.addEventListener('load', function(){
        var logedIn_UserId = '<?php echo $loged_In_user_id;?>';
        var contentId = '<?php echo $content_id;?>';
        var base_url = $('#base_url').val();
        console.log(base_url);

        $('.like-btn img').mouseenter(function(){
            $(this).attr('src', base_url + '/assets/images/frontend/community/script/like_btn_hover.png');
        });
        $('.like-btn img').mouseout(function(){
            $(this).attr('src', base_url + '/assets/images/frontend/community/script/like_btn.png');
        });
        $('.comment-btn img').mouseenter(function(){
            $(this).attr('src', base_url + '/assets/images/frontend/community/script/comment_btn_hover.png');
        });
        $('.comment-btn img').mouseout(function(){
            $(this).attr('src', base_url + '/assets/images/frontend/community/script/comment_btn.png');
        });
        var vote_lbl = $('#vote_number_lbl');
        $('#vote_btn').click(function () {
            $.ajax({
                type:'post',
                url:base_url+'community/increase_voteNum',
                dataType:'json',
                data:{content_id:contentId},
                success:function(res){
                    if(res.status=='success'){
                        vote_lbl.text(res.data);
                    }else{
                        alert('Can not give vote numbers');
                    }
                }
            });
        });

        $('#addOnComment').click(function () {
            var comment_desc = $('#comment').val();
            $.ajax({
                type:"post",
                url:base_url+'community/add_comment',
                dataType:"json",
                data:{content_id:contentId,comment_user_id:logedIn_UserId,comment_desc:comment_desc},
                success:function(res){
                    if(res.status=='success'){
                        $('#totalCommentArea').html(res.data);
                        $('#comment').val('');
                    }else{

                        alert('Can not add comment');
                    }
                }
            });
        });
        $('.back-btn').mouseover(function(){
            $('#back-btn-img').attr('src',base_url+"assets/images/frontend/studentwork/back_hover.png");
        });
        $('.back-btn').mouseout(function(){
            $('#back-btn-img').attr('src',base_url+"assets/images/frontend/studentwork/back.png");
        });
        $('.exit-btn').mouseout(function(){
            $('.exit_btn_img').attr('src',base_url+'assets/images/frontend/studentwork/exit.png');
        });
        $('.exit_btn_img').mouseover(function(){
            $('.exit_btn_img').attr('src',base_url+'assets/images/frontend/studentwork/exit_hover.png');
        });


    })
</script>
<script src="<?= base_url('assets/js/frontend/menu_manage.js') ?>" type="text/javascript"></script>