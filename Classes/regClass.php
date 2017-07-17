<?php
/**
* Include sessionClass
 */
require_once 'sessionClass.php';
/**
* Include mysqlConnectClass
 */
require_once 'mysqlConnectClass.php';
/**
* Include inputClass
 */
require_once 'inputClass.php';
/**
* Include PHPMailer
 */
require_once '~/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

/**
 * Reg Class
 */
class regClass extends inputClass
{
  private $sql;
  private $stmt;
  private $row;

  protected $firstName;
  protected $lastName;
  protected $email;
  protected $gender;
  protected $nationalCode;
  protected $dayBirth;
  protected $monthBirth;
  protected $yearBirth;
  protected $phoneNumber;
  protected $mobileNumber;
  protected $state;
  protected $city;
  protected $mainAddress;
  protected $cardNumber;
  protected $userName;
  protected $passWord;
  protected $webSiteAddress;
  protected $ip;
  protected $userLevel;
  protected $avatarName;

  function __construct()
  {
    $inputVal=new inputClass();
    $this->firstName=NULL;
    $this->lastName=NULL;
    $this->email=NULL;
    $this->gender=NULL;
    $this->nationalCode=NULL;
    $this->dayBirth=NULL;
    $this->monthBirth=NULL;
    $this->yearBirth=NULL;
    $this->phoneNumber=NULL;
    $this->mobileNumber=NULL;
    $this->state=NULL;
    $this->city=NULL;
    $this->mainAddress=NULL;
    $this->cardNumber=NULL;
    $this->userName=NULL;
    $this->passWord=NULL;
    $this->webSiteAddress=NULL;
    $this->ip=NULL;
    $this->userLevel=NULL;
    $this->avatarName=NULL;
  }
  public function Register()
  {
    $dbConnection=new mysqlConnectClass();
    if ($dbConnection->dbConnect()) {
      $inputVal=new inputClass();
      $this->email=$inputVal->email;
      $this->passWord=md5(sha1($inputVal->passWord));

      $this->sql='SELECT * FROM `Users` WHERE `Email`=? AND `Password`=?';
      $this->stmt=$connect->stmt_init();
      $this->stmt->prepare($this->sql);
      $this->stmt->bind_param('ss', $this->email, $this->passWord);
      $this->stmt->bind_result($Email, $Password);
      while ($this->row=$this->stmt->fetch()) {
        if ($this->row==0) {
          $activeCode=rand(5412356, 9871359269);
          $this->sql='INSERT INTO `Users` (`Email`, `Password`, `UserLevelId`,
                      `IsActivated`, `Status`, `ActiveCode`)
                      VALUES (?, ?, ?, ?, ?)';
          $this->stmt=$connect->stmt_init();
          $this->stmt->prepare($this->sql);
          $this->stmt->bind_param('ssiii', $this->email, $this->passWord, 1,
                                 0, 0, $activeCode);

          ob_start();
          session_start();
          $_SESSION['__ue']=$this->email;
          $_SESSION['__up']=$this->passWord;
          $_SESSION['__uc']=$activeCode;
          ob_end_flush();

          $this->sql=NULL;
          $mail=new PHPMailer;
          $mail->isSMTP();
          $mail->HOST='smtp.gmail.com';
          $mail->SMTPAuth=true;
          $mail->Username='parhamnikdooz@gmail.com';
          $mail->Password='1346_1353_kambiznikdooz';
          $mail->SMTPSecure='tls';
          $mail->Port=587;

          $mail->setFrom('parhamnikdooz@gmail.com', 'Parham Nikdouz');
          $mail->addAddress($this->input1, 'کاربر عزیز');
          $mail->addReplyTo('parhamnikdooz@gmail.com', 'parham nikdouz');

          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
          $mail->isHTML(true);

          $mail->Subject='Here is the subject';
          $mail->Body='This is the HTML message body <b>in bold!</b>';
          /**
          * $config=new config();
          * <a href="$config->url/verify.php?code=&email=$email&passWord=$passWord">VerifyLink</a>;
          *
          */
          //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
          $mail->AltBody='This is the body in plain text for non-html mail clients';

          $mail->setLanguage('fa', '~/vendor/phpmailer/phpmailer/language');

          if (!$mail->send()) {
            echo 'Message could not be send';
            echo 'Mailer Error: '.$mail->ErrorInfo;
          }
          else {
            echo 'You are register, One message has been sent.
                 Please verification your email.';
          }
        }
        else{
          echo 'Your Email Is Exists!';
        }
      }
    }
  }
  public function CompeleteRegister()
  {
    $dbConnection=new mysqlConnectClass();
    $session=new sessionClass();
    if ($dbConnection->dbConnect()) {
      if ($session->SessionLogin()) {
        $inputVal=new inputClass();
        $this->firstName=$inputVal->firstName;
        $this->lastName=$inputVal->lastName;
        $this->gender=$inputVal->gender;
        $this->nationalCode=$inputVal->nationalCode;
        $this->dayBirth=$inputVal->dayBirth;
        $this->monthBirth=$inputVal->monthBirth;
        $this->yearBirth=$inputVal->yearBirth;
        $this->phoneNumber=$inputVal->phoneNumber;
        $this->mobileNumber=$inputVal->mobileNumber;
        $this->state=$inputVal->state;
        $this->city=$inputVal->city;
        $this->mainAddress=$inputVal->mainAddress;
        $this->cardNumber=$inputVal->cardNumber;
        $this->userName=$inputVal->userName;
        $this->webSiteAddress=$inputVal->webSiteAddress;
        $this->ip=$inputVal->ip;
        $this->userLevel=$inputVal->userLevel;
        $this->avatar=$inputVal->avatarName;

        $user_Email=$_SESSION['__ue'];
        $user_Password=$_SESSION['__up'];

        $this->sql='SELECT `UserId` FROM `Users` WHERE `Email`=? AND `Password`=?';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('ss', $user_Email, $user_Password);
        $this->stmt->execute();
        while ($this->row=$this->stmt->fetch()) {
          if ($this->row==0) {
            return false;
          }
          else {
            $user_Id=$row['UserId'];
            $this->sql=NULL;
            return true;
          }
        }
        $this->sql='UPDATE `Users` SET `FirstName`=?, `LastName`=?, `GenderId`=?,
                    `DayBirth`=?, `MonthBirth`=?, `YearBirth`=?, `NationalCode`=?,
                    `CardNumber`=?, `UserName`=?, `WebSiteAddress`=?
                    WHERE `UserId`=$user_Id';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('ssiiiiiiss', $this->firstName, $this->lastName,
                               $this->gender, $this->dayBirth, $this->monthBirth,
                               $this->yearBirth, $this->nationalCode,
                               $this->cardNumber, $this->userName,
                               $this->webSiteAddress);
        $this->stmt->execute();
        $this->sql=NULL;

        $this->sql='INSERT INTO `Address` (`CityId`, `StateId`, `MainAddress`,
                   `UserId`) VALUES (?, ?, ?, ?)';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('iisi', $this->city, $this->state,
                               $this->mainAddress, $user_Id);
        $this->stmt->execute();
        $this->sql=NULL;

        //اولویت یادت نره
        $this->sql='INSERT INTO `MobileNumbers` (`MobileNumber`, `Priority`,
                   `UserId`) VALUES (?, ?, ?)';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('isi', $this->mobileNumber,
                               $priority, $user_Id);
        $this->stmt->execute();
        $this->sql=NULL;

        //اولویت یادت نره
        $this->sql='INSERT INTO `PhoneNumbers` (`PhoneNumber`, `UserId`,
                   `Priority`) VALUES (?, ?, ?)';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('isi', $this->mobileNumber,
                               $user_Id, $priority);
        $this->stmt->execute();
        $this->sql=NULL;

        //اولویت یادت نره
        $this->sql='INSERT INTO `Avatar` (`AvatarName`, `UserId`,
                   ) VALUES (?, ?)';
        $this->stmt=$connect->stmt_init();
        $this->stmt->prepare($this->sql);
        $this->stmt->bind_param('isi', $this->avatarName,
                               $user_Id);
        $this->stmt->execute();
        $this->sql=NULL;
      }
    }
  }
}
?>
