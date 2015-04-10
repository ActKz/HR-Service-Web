<?php
session_start();
if(isset($_SESSION['is_boss']))
{
    require_once('boss/post_recruit.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js?ver=2.0.3"></script>
    <link rel="stylesheet" type="text/css" href="static/semantic-ui/dist/semantic.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
    <script src="static/semantic-ui/dist/semantic.js"></script>
    <script src="js/register_button.js"></script>
    <script src="js/index.js"></script>

    <title>Just Sudo It</title>
    <link rel="shortcut icon" href="image/icon.png">
  </head>
  <body>
<?php require_once('template/register_modal.php');?>
    <div></div>
    <div class="ui green inverted menu">
      <a class="item" href="index.php">
        <i class="lightning icon"></i> Just Sudo It
      </a>
      <!--    <div class="ui pointing dropdown link item">
        <div class="text">2015-DB</div>
        <i class="dropdown icon"></i>
        <div class="menu">
        <div class="item">Lab1</div>
        </div>
        </div>-->
        <div class="right menu">
          <?php
             if(!isset($_SESSION['is_authed']))
             {
                 require_once('template/before_login.php');
             }
             else
             {
                 require_once('template/after_login.php');
             }?>
        </div>
      </div>
    <div class="container">
      <div class="ui segment">
          <!--display all post-->
         <?php
          if(isset($_SESSION['is_boss']))
          {
            $xajax->printJavascript('static/');
        ?>
         <div class="ui section divider"></div>
          <div class="massive ui animated fade yellow button" id="post_button">
            <div class="visible content">New Post</div>
            <div class="hidden content"><i class="plus icon"></i></div>
          </div>
          <div class="ui modal" id="post_modal">
            <i class="close icon"></i>
            <div class="header">New Post</div>
            <div class="ui message" id="modal_msg"></div>
            <div class="content">
            <form class="ui form" name="recruitForm" id="recruitForm"  onsubmit="<?php $reg->printScript();?>;return false;">
              <div class="three fields">
                <div class="field">
                  <label>Location</label>
                  <select class="ui dropdown selection" name="location_id">
                    <option value="">Location</option>
<?php
require_once('admin/auth/db_auth.php');
require_once('model/boss_query.php');
$db = new Boss();
$res=$db->DropdownValue("location");
if($res)
{
    foreach($res as $value)
    {
        echo "<option value='" . $value['id'] . "'>" . $value['location'] . "</option>";
    }
}
?>
                  </select>
              </div>
              <div class="field">
                <label>Occupation</label>
                  <select class="ui dropdown selection" name="occupation_id">
                    <option value="">Occupation</option>
<?php
$res=$db->DropdownValue("occupation");
if($res)
{
    foreach($res as $value)
    {
        echo "<option value='" . $value['id'] . "'>" . $value['occupation'] . "</option>";
    }
}
?>
                </select>
              </div>
              <div class="field">
                <label>Working Time</label>
                  <select class="ui dropdown selection" name="worktime">
                    <option value="">Working Time</option>
                    <option value="day">Day Shift</option>
                    <option value="night">Night Shift</option>
                    <option value="graveyard">Graveyard Shift</option>
                  </select>
              </div>
            </div>
            <div class="three fields">
              <div class="field">
                <label>Education</label>
                  <select class="ui dropdown selection" name="education">
                    <option value="">Education</option>
                    <option value="graduate">Graduate School</option>
                    <option value="undergraduate">Undergraduate School</option>
                    <option value="seniorhigh">Senior High School</option>
                    <option value="juniorhigh">Junior High School</option>
                    <option value="elementary">Elementary School</option>
                  </select>
              </div>
              <div class="field">
                <label>Experience</label>
                  <select class="ui dropdown selection" name="experience">
                    <option value="">Experience</option>
                    <option value="no">No experience required</option>
                    <option value="1">1 year</option>
                    <option value="2">2 years</option>
                    <option value="3">3 years</option>
                    <option value="4">4 years</option>
                  </select>
              </div>
              <div class="field">
                <label>Salary</label>
                  <select class="ui dropdown selection" name="salary">
                    <option value="">Salary</option>
                    <option value="22000">22000</option>
                    <option value="30000">30000</option>
                    <option value="40000">40000</option>
                    <option value="50000">50000</option>
                    <option value="70000">70000</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="actions">
            <div class="ui red button">Cancel</div>
            <button type="submit" class="ui green submit button">Post</button>
          </div>
          </form>
        </div>
        <?php }?>
      </div>
    </div>
  </body>
</html>
