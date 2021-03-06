<?php
include 'header.php';
?>
<div class="empty_placeholder"></div>
<div class="container">
  <div class="columns">
    <div class="column is-one-third">
      <div class="avatarimg">
        <img src="<?php $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($userResult['mail']))) . "?d=retro&s=300";
                  echo $grav_url; ?>" alt="" />
      </div>
    </div>
    <div class="column">
      <div class="divider">
        <p class="is-size-4"><strong>Info</strong></p>
        <form action="../includes/settings-inc.php" method="post">
          <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
          <div class="field">
            <label class="label">Display Name</label>
            <div class="control">
              <input class="input" type="text" name="screenName" placeholder="Display Name" value="<?php echo $userResult['screenName']; ?>">
            </div>
            <p class="help">This will display to public</p>
          </div>
          <div class="field">
            <label class="label">Blog Website</label>
            <div class="control">
              <input class="input" name="website" type="text" placeholder="http://" value="<?php echo $userResult['website']; ?>">
            </div>
            <p class="help">This is your website</p>
          </div>
          <div class="field">
            <label class="label">Email</label>
            <div class="control">
              <input class="input" type="text" name="mail" placeholder="Email input" value="<?php echo $userResult['mail']; ?>">
            </div>
            <p class="help">We use email to get your avatar</p>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" name="info" value="1">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="divider">
        <p class="is-size-4"><strong>Preferences</strong></p>
        <form action="../includes/settings-inc.php" method="post" name="preferences">
          <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
          <div class="field">
            <label class="label">Show Markdown Toolbar</label>
            <div class="control">
              <label class="radio">
                <input type="radio" name="markdown" id="md1" value="1">
                Yes
              </label>
              <label class="radio">
                <input type="radio" name="markdown" id="md0" value="0">
                No
              </label>
            </div>
            <p class="help">What is <a href="https://simplemde.com/markdown-guide" target="_blank">Markdown</a></p>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" type="submit" name="preferences" value="1">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <div class="divider">
        <p class="is-size-4"><strong>Password</strong></p>
        <form action="../includes/settings-inc.php" method="post">
          <div class="field">
            <label class="label">Current Password</label>
            <div class="control">
              <input class="input" name="currentPass" type="password" placeholder="Current Password" value="">
            </div>
          </div>
          <div class="field">
            <label class="label">New Password</label>
            <div class="control">
              <input class="input" name="newPass" type="password" placeholder="New Password" value="">
            </div>
          </div>
          <div class="field">
            <label class="label">Conform Password</label>
            <div class="control">
              <input class="input" name="doubleCheck" type="password" placeholder="Conform Password" value="">
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" name="changePassword" value="1">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  window.onload = function() {
    <?php
    if ($settings['markdowntoolbar'] == 1) {
      echo "$('#md1').prop('checked', true);";
    } else {
      echo "$('#md0').prop('checked', true);";
    }
    ?>
  }
</script>"
<?php
include 'footer.php';
echo '<script>';
$errorMessage = $_GET['action'];
switch ($errorMessage) {
  case 'updated':
    echo "window.onload=showNoti('Profile Updated', 'success');";
    break;
  case 'passwordEmpty':
    echo "window.onload=showNoti('Content empty!', 'error');";
    break;
  case 'newPassNotSame':
    echo "window.onload=showNoti('Password not same!', 'error');";
    break;
  case 'passDontMatch':
    echo "window.onload=showNoti('Password not much!', 'error');";
    break;
  case 'infoEmpty':
    echo "window.onload=showNoti('Info missing!', 'error');";
    break;
  case 'wrongurl':
    echo "window.onload=showNoti('Website is not legit!', 'error');";
    break;
  case 'wrongemail':
    echo "window.onload=showNoti('Wrong email!', 'error');";
    break;
  case 'infoUpdated':
    echo "window.onload=showNoti('Profile updated!', 'success');";
    break;
  default:
    echo "";
}
if ($settings['markdowntoolbar'] == 1) {
  echo "$('#md1').prop('checked', true);";
} else {
  echo "$('#md0').prop('checked', true);";
}
?>

document.title = "Profile";
</script>

</body>

</html>