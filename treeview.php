<?php
 $classes_subj[0] = array("classid"=>"11", "classname"=> "abs class 2", "campusid"=>  "12" ,"subjectsid"=>"4,3","dateadded"=>  "2021-06-10 12:00:47" );
$sub_names[0] =  array("subjectid"=> "2", "subjectname"=>  "absd subjectbbbbbbbbbb" ,
"subjectdescription"=>  "absd subjectbbbbbbbbbbbbbb",
 "campusid"=> "12" ,
 "dateadded"=> "2021-06-15 09:03:44" );
 $files[0]=array("id"=>"11","rel_id"=>"11","file_name"=>"11","re_type"=>"11",);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.a_li_s {
    /* border: 1px solid #dad7d7;
    background: #fbf3f3; */
    padding: 1%;
    border-radius: 8px;
    margin-left: 20%;

    display: none;
    transition: display 2s;
    cursor: pointer;
}

.a_li {
    /* border: 1px solid #dad7d7;
    background: #fbf3f3; */

    border-radius: 10px;
    margin-left: 6%;
    margin-top: 2%;
    padding-bottom: 1%;
    /* padding-left: 3%;
    padding-right: 10%; */

    display: none;
    transition: display 2s;
    cursor: pointer;


}

.a_li_c {
    /* display: block; */
    border-radius: 8px;

    margin-top: 2%;
    padding-bottom: 1%;
    /* padding-left: 3%;
    padding-right: 10%; */

    display: block;
    cursor: pointer;
}
</style>
<div class="panel_s section-heading section-files">
    <div id="breadcrumb" class="breadcrumb">

    </div>
    <div id="allclasses" class="panel-body">
        <h5>
            <a id="b_classes">All Classes</a>
            <a onClick="" id="b_class"></a>
            <a onClick="" id="b_subjects"></a>
            <a id="b_subject" href=""></a>
            <a id="b_s_files" href=""></a>
        </h5>
        <br>
        <ul id="ul_classes">
            <?php foreach($classes_subj as $cs){
            $sids = explode(",",$cs['subjectsid']);
            ?>

            <li>
                <a onClick="tv_c_f(this);" class="breadcrumb a_li_c"><span class="fa fa-building"></span>
                    <?= $cs['classname'] ?></a>
                <ul id="ul_subj">
                    <?php foreach($sids as $s) {
                        $k = array_search($s[0], array_column($sub_names, 'subjectid'));
                        
                        ?>
                    <li>
                        <a onClick="tv_s_f(this);" class="breadcrumb a_li"><span class="fa fa-book"></span>
                            <?= $sub_names[$k]['subjectname'] ?></a>
                        <ul id="ul_files">
                            <?php foreach($files as $file) {
                                if($file['rel_type'] == 'subject' && $file['rel_id'] == $s[0]) {
                             ?>
                            <li><a href='<?= site_url() ?>clients/attachment_download?rel_id=<?= $file['rel_id'] ?>&&file_name=<?= $file['file_name'] ?>'
                                    class="breadcrumb a_li_s" style="margin-left:20%;"><span
                                        class="fa fa-download"></span> <?= $file['file_name'] ?> <b
                                        style="color:gray">uploaded date:(<?= $file['dateadded'] ?>)</b></a></li>
                            <?php }}?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </li>

            <?php 
             
        } ?>
        </ul>
    </div>
    <div hidden id="allsub" class="panel-body">
        <h4 class="no-margin section-text"><?php echo _l('customer_profile_files'); ?></h4>

    </div>
    <div hidden id="allsubfiles" class="panel-body">
        <h4 class="no-margin section-text"><?php echo _l('customer_profile_files'); ?></h4>

    </div>

    <hr>
    <div hidden class="panel-body">
        <h4 class="no-margin section-text"><?php echo _l('customer_profile_files'); ?></h4>
        <?php hooks()->do_action('after_customers_area_files_heading'); ?>
    </div>
</div>


<script>
function tv_c_f(v) {
    //console.log($(v).parent().find('ul').find('li').find('.a_li'));
    if ($($(v).parent().find('ul').find('li').find('.a_li')).is(":visible")) {
        $("#b_class").text("");
        $(v).parent().find('ul').find('li').find('.a_li').attr('style', 'display:none; ');
        $("#b_subjects").text("");
        if ($('.a_li_s').is(":visible") == true)
            $('.a_li_s').hide();
    } else {
        if ($('#ul_subj').is(":visible")) {
            $('.a_li').attr("style", "display:none");
            $('.a_li_s').attr("style", "display:none");
        }


        $("#b_class").text("/" + $(v).text());
        $("#b_subjects").text("");
        $(v).parent().find('ul').find('li').find('.a_li').attr('style', 'display:block; ');
    }
}

function tv_s_f(v) {

    if ($($(v).parent().find('ul').find('li').find('.a_li_s')).is(":visible")) {
        $(v).parent().find('ul').find('li').find('.a_li_s').attr('style', 'display:none; ');
        $("#b_subjects").text("");
    } else {
        if ($('.a_li_s').is(":visible")) {

            $('.a_li_s').attr("style", "display:none");
        }
        $("#b_subjects").text("/" + $(v).text());
        $(v).parent().find('ul').find('li').find('.a_li_s').attr('style', 'display:block; ');
    }
}
</script>