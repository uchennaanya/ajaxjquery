<?php
    error_reporting(E_ERROR|E_WARNING);
class data{
    var $fname, $sname, $gender, $dob, $age, $phone, $mail, $address, $state, $guidian, $image;
    public function __construct($fname, $sname, $gender, $dob, $age, $phone, $mail, $address, $state, $guidian, $image){
        $this->fname = $fname;
        $this->sname = $sname;
        $this->gender = $mail;
        $this->dob = $dob;
        $this->age = $age;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->address = $address;
        $this->state = $state;
        $this->guidian = $guidian;
        $this->image = $image;
    }
    public function getData() {
        $data = $this->fname.$this->sname.$this->gender.$this->mail.$this->dob.$this->age.$this->phone.$this->address.$this->state.$this->guidian.$this->image;
         echo $this->chkTxt($data);   
    }
    private function chkTxt($txt){
        $txt = trim($txt);
        $txt = htmlspecialchars($txt);
        $txt = stripslashes($txt);
            return $txt;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $guidian = $_POST['guidian'];
    $image = $_FILES['image'];
    if (empty($fname) or !preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"fname");
    } else if (empty($sname) or !preg_match("/^[a-zA-Z ]*$/",$sname)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"sname");
    } 
    else if (empty($gender) or !preg_match("/^[a-zA-Z]*$/",$gender)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"gender");
    } else if (empty($dob)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"dob");    
    } else if (empty($age) or !preg_match("/^[0-9]*$/",$age)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"age");   
    } else if (empty($phone) or !preg_match("/^[0-9]*$/",$phone)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"phone");
    } else if (empty($mail) or !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"mail");
    } else if (empty($address) or !preg_match("/^[a-zA-Z 0-9 .]*$/", $address)){
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"address");
    } else if (empty($state) or !preg_match("/^[a-zA-Z ]*$/",$state)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"state");
    } else if (empty($guidian) or !preg_match("/^[a-zA-Z]*$/",$guidian)) {
        $respond = array('status'=>0,'message'=>"Field required!",'input'=>"guidian");
    } else if (empty($_FILES['image']['name'])) { 
        $respond = array('status'=>0,'message'=>"Select picture for upload!",'input'=>"image");      
    } else {
        $respond = array('status'=>1,'message'=>"Congratulations!",'data'=>$fname.$sname.$age.$dob.$phone.$mail.$state.$guidian.$address.$gender.$image);
       
    if (ISSET($_FILES['image'])) {
    $err = array();
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    $filetype = $_FILES['image']['type'];
    $filesize = $_FILES['image']['size'];
    $filext = strtolower(end(explode('.', $_FILES['image']['name'])));
    $extentions = array("jpeg", "png", "jpg", "mp4");
    if (in_array($filext, $extentions) === false){
    $err[] = "extention not found";
    }
    if ($filesize > 5000000) {
        $err[] = "File too large";
    }
    if (empty($err) == true ) {
        move_uploaded_file($filetmp, "images/".$filename);
    }
    }
    }
     echo json_encode($respond);
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    $txt = $fname;
    fwrite($myfile, " FirstName: ".$txt);
    $txt = $sname;
    fwrite($myfile, " SecondName: ".$txt);
    $txt = $gender;
    fwrite($myfile, " Gender: ".$txt);
    $txt = $dob;
    fwrite($myfile, " DoB: ".$txt);
    $txt = $age;
    fwrite($myfile, " Age: ".$txt);
    $txt = $phone;
    fwrite($myfile, " Phone: ".$txt);
    $txt = $mail;
    fwrite($myfile,  " Email: ".$txt);
    $txt = $address;
    fwrite($myfile, " Address: ".$txt);
    $txt = $state;
    fwrite($myfile,  " State: ".$txt);
    $txt = $guidian;
    fwrite($myfile, " Guidian: ".$txt);
    $txt = $filename;
    fwrite($myfile, " Image: ".$txt);
    fclose($myfile);
//    header("location:login.php");
}

?>