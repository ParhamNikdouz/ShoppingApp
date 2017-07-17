<?php
/**
* Include filterInputClass
 */
require_once 'filterInputClass.php';
/**
* Entry Data Class
*/
class inputClass extends filterInputClass
{
  private $firstName;
  private $lastName;
  private $email;
  private $gender;
  private $nationalCode;
  private $dayBirth;
  private $monthBirth;
  private $yearBirth;
  private $phoneNumber;
  private $mobileNumber;
  private $state;
  private $city;
  private $mainAddress;
  private $cardNumber;
  private $userName;
  private $passWord;
  private $webSiteAddress;
  private $ip;
  private $comment;
  private $userLevel;
  private $avatarName;

  private $postTitle;
  private $postAbstract;
  private $postMainText;
  private $postCategory;
  private $postDate;
  private $pageDescription;
  private $postKeyWords;
  private $postImageName;

  private $postCategoryTitle;

  protected $data;

  function __construct()
  {
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
    $this->address=NULL;
    $this->cardNumber=NULL;
    $this->userName=NULL;
    $this->passWord=NULL;
    $this->webSiteAddress=NULL;
    $this->ip=NULL;
    $this->comment=NULL;
    $this->userLevel=NULL;
    $this->avatarName=NULL;

    $this->postTitle=NULL;
    $this->postAbstract=NULL;
    $this->postMainText=NULL;
    $this->postCategory=NULL;
    $this->postDate=NULL;
    $this->pageDescription=NULL;
    $this->postKeyWords=NULL;
    $this->postImageName=NULL;
    $this->postViewers=NULL;
    $this->postLikes=NULL;
  }
  public function SetFirstName($firstName)
  {
      $filterInput=new filterInputClass();
      $this->firstName=$filterInput->SanitizeString($firstName);
  }
  public function GetFirstName()
  {
      return $this->firstName;
  }
  public function SetLastName($lastName)
  {
      $filterInput=new filterInputClass();
      $this->lastName=$filterInput->SanitizeString($lastName);
  }
  public function GetLastName()
  {
      return $this->lastName;
  }
  public function SetEmail($email)
  {
    $filterInput=new filterInputClass();
    $this->email=$filterInput->SanitizeString($email);
  }
  public function GetEmail()
  {
      return $this->email;
  }
  public function SetGender($gender)
  {
    $filterInput=new filterInputClass();
    $this->gender=$filterInput->SanitizeString($gender);
  }
  public function GetGender()
  {
      return $this->gender;
  }
  public function SetNationalCode($nationalCode)
  {
    $filterInput=new filterInputClass();
    $this->nationalCode=$filterInput->SanitizeString($nationalCode);
  }
  public function GetNationalCode()
  {
      return $this->nationalCode;
  }
  public function SetDayBirth($dayBirth)
  {
    $filterInput=new filterInputClass();
    $this->dayBirth=$filterInput->SanitizeString($dayBirth);
  }
  public function GetDayBirth()
  {
      return $this->dayBirth;
  }
  public function SetMonthBirth($monthBirth)
  {
    $filterInput=new filterInputClass();
    $this->monthBirth=$filterInput->SanitizeString($monthBirth);
  }
  public function GetMonthBirth()
  {
      return $this->monthBirth;
  }
  public function SetYearBirth($yearBirth)
  {
    $filterInput=new filterInputClass();
    $this->yearBirth=$filterInput->SanitizeString($yearBirth);
  }
  public function GetYearBirth()
  {
      return $this->yearBirth;
  }
  public function SetPhoneNumber($phoneNumber)
  {
    $filterInput=new filterInputClass();
    $this->phoneNumber=$filterInput->SanitizeString($phoneNumber);
  }
  public function GetPhoneNumber()
  {
      return $this->phoneNumber;
  }
  public function SetMobileNumber($mobileNumber)
  {
    $filterInput=new filterInputClass();
    $this->mobileNumber=$filterInput->SanitizeString($mobileNumber);
  }
  public function GetMobileNumber()
  {
      return $this->mobileNumber;
  }
  public function SetState($state)
  {
    $filterInput=new filterInputClass();
    $this->state=$filterInput->SanitizeString($state);
  }
  public function GetState()
  {
      return $this->state;
  }
  public function SetCity($city)
  {
    $filterInput=new filterInputClass();
    $this->city=$filterInput->SanitizeString($city);
  }
  public function GetCity()
  {
      return $this->city;
  }
  public function SetMainAddress($mainAddress)
  {
    $filterInput=new filterInputClass();
    $this->mainAddress=$filterInput->SanitizeString($mainAddress);
  }
  public function GetMainAddress()
  {
      return $this->mainAddress;
  }
  public function SetCardNumber($cardNumber)
  {
    $filterInput=new filterInputClass();
    $this->cardNumber=$filterInput->SanitizeString($cardNumber);
  }
  public function GetCardNumber()
  {
      return $this->cardNumber;
  }
  public function SetUserName($userName)
  {
    $filterInput=new filterInputClass();
    $this->userName=$filterInput->SanitizeString($userName);
  }
  public function GetUserName()
  {
      return $this->userName;
  }
  public function SetPassWord($passWord)
  {
    $filterInput=new filterInputClass();
    $this->passWord=$filterInput->SanitizeString($passWord);
  }
  public function GetPassWord()
  {
      return $this->passWord;
  }
  public function SetWebSiteAddress($webSiteAddress)
  {
    $filterInput=new filterInputClass();
    $this->webSiteAddress=$filterInput->SanitizeString($webSiteAddress);
  }
  public function GetWebSiteAddress()
  {
      return $this->webSiteAddress;
  }
  public function SetIp($ip)
  {
    $filterInput=new filterInputClass();
    $this->ip=$filterInput->SanitizeString($ip);
  }
  public function GetIp()
  {
      return $this->ip;
  }
  public function SetComment($comment)
  {
    $filterInput=new filterInputClass();
    $this->comment=$filterInput->SanitizeString($comment);
  }
  public function GetComment()
  {
      return $this->comment;
  }
  public function SetUserLevel($userLevel)
  {
    $filterInput=new filterInputClass();
    $this->userLevel=$filterInput->SanitizeString($userLevel);
  }
  public function GetUserLevel()
  {
      return $this->userLevel;
  }
  public function SetAvatarName($avatarName)
  {
    $filterInput=new filterInputClass();
    $this->avatarName=$filterInput->SanitizeString($avatarName);
  }
  public function GetAvatarName()
  {
      return $this->avatarName;
  }
  public function SetPostTitle($postTitle)
  {
    $filterInput=new filterInputClass();
    $this->postTitle=$filterInput->SanitizeString($postTitle);
  }
  public function GetPostTitle()
  {
      return $this->postTitle;
  }
  public function SetPostAbstract($postAbstract)
  {
    $filterInput=new filterInputClass();
    $this->postAbstract=$filterInput->SanitizeString($postAbstract);
  }
  public function GetPostAbstract()
  {
      return $this->postAbstract;
  }
  public function SetPostMainText($postMainText)
  {
    $filterInput=new filterInputClass();
    $this->postMainText=$filterInput->SanitizeString($postMainText);
  }
  public function GetPostMainText()
  {
      return $this->postMainText;
  }
  public function SetPostCategory($postCategory)
  {
    $filterInput=new filterInputClass();
    $this->postCategory=$filterInput->SanitizeString($postCategory);
  }
  public function GetPostCategory()
  {
      return $this->postCategory;
  }
  public function SetPostDate($postDate)
  {
    $filterInput=new filterInputClass();
    $this->postDate=$filterInput->SanitizeString($postDate);
  }
  public function GetPostDate()
  {
      return $this->postDate;
  }
  public function SetPageDescription($pageDescription)
  {
    $filterInput=new filterInputClass();
    $this->pageDescription=$filterInput->SanitizeString($pageDescription);
  }
  public function GetPageDescription()
  {
      return $this->pageDescription;
  }
  public function SetPostKeyWords($postKeyWords)
  {
    $filterInput=new filterInputClass();
    $this->postKeyWords=$filterInput->SanitizeString($postKeyWords);
  }
  public function GetPostKeyWords()
  {
      return $this->postKeyWords;
  }
  public function SetPostImageName($postImageName)
  {
    $filterInput=new filterInputClass();
    $this->postImageName=$filterInput->SanitizeString($postImageName);
  }
  public function GetPostImageName()
  {
      return $this->postImageName;
  }

  public function SetPostCategoryTitle($postCategoryTitle)
  {
    $filterInput=new filterInputClass();
    $this->postCategoryTitle=$filterInput->SanitizeString($postCategoryTitle);
  }
  public function GetPostCategoryTitle()
  {
      return $this->postCategoryTitle;
  }
?>
