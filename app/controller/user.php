<?php
require_once ('controller.php');
require_once ('../model/user_model.php');
require_once ('../model/post_model.php');

class UserController extends Controller{

  public function login($username, $password) {
    try {
      $u = new UserModel($username, $password);
      session_start();
      $_SESSION['user'] = $u->to_array();
      $this->respond(false, 'Logged in', $_SESSION['user']);
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage());
    }
  } 
  public function signup($details) {
    try {
      $u = new UserModel();
      $u->create($details);
      $this->respond(false, 'Signed up successfully!', $u->to_array());
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage());
    }
  } 
  public function logout() {
    try {
      session_start();
      unset($_SESSION['user']);
      session_destroy();
      $this->respond(false, 'Logged out successfully');
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage());
    }
  }
  public function isLoggedIn() {
    session_start();
    return isset($_SESSION['user'])
      && isset($_SESSION['user']['username'])
      && isset($_SESSION['user']['email']);
  }
  public function getLoginStatus() {
    if($this->isLoggedIn()) {
      //$this->respond(false, 'User is logged in', $_SESSION['user']);
      $this->respond(false, 'User is logged in', (new UserModel($_SESSION['user']['username']))->to_array());
    } else {
      $this->respond(true, 'No user logged in');
    }
  }
  public function studentsOf($instituteId) {
    try {
      $this->respond(false, 'successfully got the data', (new UserModel())->studentsOf($instituteId));
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage());
    }
  }
  public function employeesOf($companyId) {
    try {
      $this->respond(false, 'successfully got the data', (new UserModel())->employeesOf($companyId));
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage());
    }
  }
  public function getProfile($username) {
    try {
      $this->respond(false, 'successfully got the data', (new UserModel($username))->to_array());
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage());
    }
  }
  public function addCompany($username, $password, $newDetails) {
    try {
      if($this->isLoggedIn()) {
        $u = new UserModel($username, $password);
        $u->addCompany($newDetails);
        $_SESSION['user'] = $u->to_array();
        $this->respond(false, 'Successfully updated!', $_SESSION['user']);
      }
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage(), $e);
    }
  }
  public function addComment($postId, $commentDetails) {
    try {
      if($this->isLoggedIn()) {
        $post = new PostModel($postId);
        $commentDetails['commentBy'] = $_SESSION['user']['_id'];
        $post->addComment($commentDetails);
        $this->respond(false, 'Comment made!', $post->to_array());
      }
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage(), $e);
    }
  }
  public function addPost($postDetails) {
    try {
      if($this->isLoggedIn()) {
        $post = new PostModel();
        $postDetails['postBy'] = $_SESSION['user']['_id'];
        $post->create($postDetails);
        $this->respond(false, 'Post made!', $post->to_array());
      }
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage(), $e);
    }
  }
  public function addInstitute($username, $password, $newDetails) {
    try {
      if($this->isLoggedIn()) {
        $u = new UserModel($username, $password);
        $u->addInstitute($newDetails);
        $_SESSION['user'] = $u->to_array();
        $this->respond(false, 'Successfully updated!', $_SESSION['user']);
      }
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage(), $e);
    }
  }
  public function update($username, $password, $newDetails) {
    try {
      if($this->isLoggedIn()) {
        $u = new UserModel($username, $password);
        foreach($newDetails as $key => $value) {
          if(!in_array($key, ['_id', 'username', 'password', 'hashed_password', 'email'])) {
            $u->$key = $value;
          }
        }
        $u->update();
        $_SESSION['user'] = $u->to_array();
        $this->respond(false, 'Successfully updated!', $_SESSION['user']);
      }
    } catch (Exception $e) {
      $this->respond(true, $e->getMessage(), $e);
    }
  }
  public function changePassword($username, $old_password, $new_password) {
    // TODO :
    // 1) Check if logged in, if not, destroy session and unset everything
    // 2) Check if old === new, if yes then $this->respond(true, 'choose a different password')
    // 3) Check if username exists [being in session doesn't necessarily mean that user is in DB]
    // 4) Finally accept the new password and make changes to database (using only the model functions)

  }
}

