<?php
// koneksi database
$conn = mysqli_connect("localhost:3307", "root", "", "yb");

if(!$conn){
    echo "<script>
            alert('Failde to Connect into Database')
        </script>";
}


//ADMIN
function login($request){
    global $conn;
    
    $email = $request['email'];
    $password = $request['password'];

    $emailcek = "SELECT * FROM admin WHERE email = '$email'";
    $select = mysqli_query($conn, $emailcek);
    if(mysqli_num_rows($select) == 1){
        $result = mysqli_fetch_assoc($select);
    

    if(password_verify($password, $result['password'])){
        $_SESSION['id_admin'] = $result['id_admin'];
        $_SESSION['email'] = $result['email'];

        if( isset($_POST['remember'])) {
            setcookie('login', 'true', time() + 60);
        }

        $_SESSION['message'] = 'Berhasil login';

        header("Location: admin.php");
        exit();

        
    }else{
        $_SESSION['message'] = 'Password Salah';
        header("Location: loginadmin.php");
        exit();

    }

    }   

    $_SESSION['message'] = 'Email atau Password Belum pernah terdaftar';

        header("Location: loginadmin.php");
        exit();

  }

  function registrasi($request){
    global $conn;
    
    $email = $request['email'];
    $password = mysqli_real_escape_string($conn, $request['password']);
    $passwordconfirm = mysqli_real_escape_string($conn, $request['passwordconfirm']);

    $emailcek = "SELECT * FROM admin WHERE email = '$email'";
    $select = mysqli_query($conn, $emailcek);

    if(!mysqli_fetch_assoc($select)){
        // $result = mysqli_fetch_assoc($select);
        if($password == $passwordconfirm){
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $query = "INSERT INTO admin VALUES ('',  '$email', '$password' )";
            mysqli_query($conn, $query);

            $_SESSION['registered'] = 'Berhasil registrasi, silahkan login';

            header('Location: loginadmin.php');
            exit();
        }
    $_SESSION['message'] = 'Email anda sudah pernah terdaftar';

    header('Location: registeradmin.php');
    exit();
   

    }   
  }


  //USERR

  function loginuser($request){
    global $conn;
    
    $emailuser = $request['emailuser'];
    $passworduser = $request['passworduser'];

    $emailusercek = "SELECT * FROM cust WHERE emailuser = '$emailuser'";
    $select = mysqli_query($conn, $emailusercek);
    if(mysqli_num_rows($select) == 1){
        $result = mysqli_fetch_assoc($select);
    

    if(password_verify($passworduser, $result['passworduser'])){
        $_SESSION['id_cust'] = $result['id_cust'];
        $_SESSION['emailuser'] = $result['emailuser'];
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['alamat'] = $result['alamat'];
        $_SESSION['no_hp'] = $result['no_hp'];

        if( isset($_POST['remember'])) {
            setcookie('login', 'true', time() + 60);
        }

        $_SESSION['messageuser'] = 'Berhasil login';

        header("Location: User.php");
        exit();

        
    }else{
        $_SESSION['messageuser'] = 'Password Salah';
        header("Location: loginuser.php");
        exit();

    }

    }   

    $_SESSION['messageuser'] = 'Email atau Password Belum pernah terdaftar';

        header("Location: loginuser.php");
        exit();

  }

  function registrasiuser($request){
    global $conn;
    
   
    $emailuser = $request['emailuser'];
    $passworduser = mysqli_real_escape_string($conn, $request['passworduser']);
    $passwordconfirm2 = mysqli_real_escape_string($conn, $request['passwordconfirm2']);
    $nama = $request['nama'];
    $alamat = $request['alamat'];
    $no_hp = $request['no_hp'];
    $emailusercek = "SELECT * FROM cust WHERE emailuser = '$emailuser'";
    $select = mysqli_query($conn, $emailusercek);

    if(!mysqli_fetch_assoc($select)){
        // $result = mysqli_fetch_assoc($select);
        if($passworduser == $passwordconfirm2){
            $passworduser = password_hash($passworduser, PASSWORD_DEFAULT);
            
            $query = "INSERT INTO cust VALUES ('',  '$emailuser', '$passworduser', '$nama','$alamat', '$no_hp')";
            mysqli_query($conn, $query);

            $_SESSION['registereduser'] = 'Berhasil registrasi, silahkan login';

            header('Location: loginuser.php');
            exit();
        }
    $_SESSION['messageuser'] = 'Email anda sudah pernah terdaftar';

    header('Location: registeruser.php');
    exit();
   

    }   
  }
  function updateuser($request) {

    global $conn;

    if ($request['passworduser'] == $request['passwordconfirm']) {
        $passworduser = password_hash($request['passworduser'], PASSWORD_DEFAULT);

        $nama = $request['nama'];
        $no_hp = $request['no_hp'];
        $alamat = $request['alamat'];
        $emailuser = $_SESSION['emailuser'];
      
        $query = "UPDATE cust SET
            nama ='$nama', 
            alamat ='$alamat', 
            no_hp = '$no_hp', 
            passworduser = '$passworduser'
            WHERE emailuser =  '$emailuser'";
        $update = mysqli_query($conn, $query);

        $name='warna';
        $value=$_POST['warna'];	
        $_COOKIE['warna']=$value;
        setcookie($name,$value,time()+ 60);

        if ($update) {
            $_SESSION['emailuser'] = $emailuser;
            $_SESSION['nama'] = $nama;
            $_SESSION['alamat'] = $no_hp;
            $_SESSION['no_hp'] = $no_hp;
            header('Location: userprofile.php');
        } else {
            echo mysqli_error($conn);
        }
    }

  }
?>