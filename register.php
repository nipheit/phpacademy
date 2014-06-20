<?php
require_once 'core/init.php';

var_dump(Token::check(Input::get('token')));

if (Input::exists()) {
  $validate = new Validate();
  $validation = $validate->check($_POST, array(
    'username' => array(
      'required' => TRUE,
      'min' => 2,
      'max' => 20,
      'unique' => 'users'
    ),
    'password' => array(
      'required' => TRUE,
      'min' => 6
    ),
    'password_again' => array(
      'required' => TRUE,
      'matches' => 'password'
    ),
    'name' => array(
      'required' => TRUE,
      'min' => 2,
      'max' => 50
    )
  ));

  if ($validation->passed()) {
    echo 'Passed';
  } else {
    foreach ($validation->errors() as $error) {
      echo $error . '<br />';
    }
  }
}

?>
<form action="" method="post">
  <div class="field">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?php echo Input::get('username'); ?>" autocomplete="off" />
  </div>

  <div class="field">
    <label for="password">Choose a password</label>
    <input type="password" name="password" id="password" />
  </div>

  <div class="field">
    <label for="password_again">Enter your password again</label>
    <input type="password" name="password_again" id="password_again" />
  </div>

  <div class="field">
    <label for="name">Enter your name</label>
    <input type="text" name="name" id="name" value="<?php echo Input::get('name'); ?>" autocomplete="off" />
  </div>

  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
  <input type="submit" value="Register" />

</form>