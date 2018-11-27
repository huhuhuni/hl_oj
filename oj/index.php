<?php 


class hu{
    function __construct() {
        //$this->init();
        $this->start();//echo "<script>location='index.html'</script>";echo 1;
    }
    function start() {
        //$this->check_login();//echo 1;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->action = isset($_GET['action']) ? trim($_GET['action']) : "";
            $this->do = isset($_GET['do']) ? trim($_GET['do']) : "";
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->action = isset($_POST['action']) ? trim($_POST['action']) : false;
            if(!$this->action){
                $this->action = isset($_GET['action']) ? trim($_GET['action']) : "";
            }
            $this->do = isset($_POST['do']) ? trim($_POST['do']) : "";
        }
        //$this->check_login();
        if ($this->action == "") {
            $this->main();
        } elseif (method_exists($this, "action_{$this->action}")) {
            $this->{"action_{$this->action}"}();
        }
    }
    function main()
    {
        //$this->T->out('website.html');
        //$this->T->in("userinfo",$_SESSION['UserInfo']);
        echo "<script>location='main.php'</script>";
    }
    function action_top()
    {
//         $this->T->in("userinfo",$_SESSION['UserInfo']);
//         $this->T->out("top.menu.html");
        echo "<script>location='top.menu.php';</script>";
    }
    
    function action_left()
    {
//         $this->T->in("userinfo",$_SESSION['UserInfo']);
//         $this->T->out("left.main.html");
        echo "<script>location='left.main.html';</script>";
    }
    
    function action_main()
    {echo "<script>location='main.main1.html';</script>";}
    
    function action_question()
    {echo "<script type='text/javascript'>window.top.location.href='question.php'</script>";}
    
    function action_seequestion()
    {
   echo "<script type='text/javascript'>window.top.location.href='seequestion.php?id=".$_GET['id']."';</script>";}
    
   function action_doquestion()
   {
       echo "<script type='text/javascript'>window.top.location.href='doquestion.php?id=".$_GET['id']."';</script>";}
      
   function action_sort()
   {
    echo "<script type='text/javascript'>window.top.location.href='sort.php';</script>";}
  
    function action_state()
    {
        echo "<script type='text/javascript'>window.top.location.href='state.php';</script>";}
        
    function check_login() {
        //echo $_SESSION[GAOYIPINGSK];echo $_SESSION['UserInfo'];
        //echo GAOYIPING;
        if(!isset($_SESSION[HUSK]))
            
            echo "<script type='text/javascript'>window.top.location.href='login.HTML'</script>"; 
            else if($_SESSION[HUSK] != HUSK){
               unset($_SESSION[HUSK]);
            unset($_SESSION['UserInfo']);
            echo "<script type='text/javascript'>window.top.location.href='login.HTML'</script>";
            exit;
        }
    }
    function action_logout(){
        if (!session_id()) session_start();
        if(isset($_SESSION['UserInfo'])){
        //unset($_SESSION[HUSK]);
        unset($_SESSION['UserInfo']);}
        echo 1111;
        echo "<script type='text/javascript'>window.top.location.href='index.php'</script>";
    }
    
}
new hu();
?>