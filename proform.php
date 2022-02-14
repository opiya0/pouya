<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
if(isset($_POST["name"]))$name=$_POST["name"];
if(isset($_POST["name"]))$email=$_POST["email"];
if(isset($_POST["name"]))$password=$_POST["password"];

$servername="localhost";
$username="root";
$password="";
$db="new";
$link= mysqli_connect($servername,$username,$password,$db);
if(!$link){
    die("fainled " . mysqli_connect_error());
}



$flag=false;
if(strlen($name)==0){
    $flag=true;
    $name_error="نام را وارد نکرده اید";
}

    $flag=false;
if(strlen($email)==0){
    $flag=true;
    $email_error="ایمیل را وارد کنید";
    
}




if (!$flag)
 {

  $passHash = md5($password);
  $sql = "INSERT INTO new(name, email, password )   VALUES ('$name', '$email',  '$passHash' )";
  
  if ($link->query($sql) === TRUE) {
    // echo "ثبت نام با موفقیت انجام شد.";
    $_SESSION['logined'] = true;
    $_SESSION['user']=["name"=>$name,"email"=>$email];
    header("location:home.php");
    exit();
  }
    else{
        echo"خطا". $sql . "<br>" . $link->error;
    }






}
 }

?>
<!DOCTYPE html>
<html>
    <head><title>پروژه جدید</title></head>
    <body style="directon:rtl">
    <div style="height:300px;width:500px;background-color:lightblue;margin-left:120px">
    <form method="POST" action="new.php"><br>
fulname:<input type="text" name="name"> <p style ="color:red"> <?php echo  @$name_error; ?> </p>
email:<input type="email" name="email"> <p style ="color:red"> <?php echo  @$email_error; ?> </p>
password:<input type="text" name="password"> <p style ="color:red"> <?php echo  @$password_error; ?> </p>
<input type="submit" value="ثبت">
</div>






</form>
</body>
</html>
