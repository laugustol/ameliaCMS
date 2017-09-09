<?php
namespace Models;
class userModel{
	private $db,$permission,$mailer;
	public $idperson,$name,$password,$note,$question,$answer;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	private function encrypter($pass){
		$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')),0, 22);
		$salt = strtr($salt, array('+'=>'.'));
		$hash = crypt($pass,'$2y$10$'.$salt);
		return $hash;
	}
	public function login(){
		$a=$this->db->prepare("SELECT u.iduser,pe.idperson,c.idcharge,u.name AS uname,c.name AS cname,pe.image,pe.name_one AS pename_one,pe.last_name_one as pelast_name_one,pe.sex,u.initiated,u.status,p.password FROM ".PREFIX."tuser u 
			INNER JOIN ".PREFIX."tperson pe ON u.idperson=pe.idperson
			INNER JOIN ".PREFIX."tcharge c ON pe.idcharge=c.idcharge
			INNER JOIN ".PREFIX."tdpassword p ON u.iduser=p.iduser 
			WHERE u.name=? AND p.status='1';");
		$this->db->execute(array($this->name));
		$user = $this->db->fetchAll();
		if($user[0] != ""){
			foreach ($user as $val) {
				if(crypt($this->password,$val["password"]) == $val["password"]){
					if($val["status"] == '1'){
						$_SESSION["iduser"]=$val["iduser"];
						$_SESSION["idperson"]=$val["idperson"];
						$_SESSION["idcharge"]=$val["idcharge"];
						$_SESSION["uname"]=$val["uname"];
						$_SESSION["cname"]=$val["cname"];
						$_SESSION["image"]=($val["image"]!="")? $val["image"] : (($val["sex"] == "M")? 'img/male.png' : 'img/female.png');
						$_SESSION["pename_one"]=$val["pename_one"];
						$_SESSION["pelast_name_one"]=$val["pelast_name_one"];
						$_SESSION["initiated"]=$val["initiated"];
						$this->db->prepare("UPDATE ".PREFIX."tuser SET failed_attempts=0 WHERE name=? ");
						$this->db->execute(array($this->name));
					}else{
						return 3;
					}
				}else{
					return $this->failed_attempts($user);
				}
			}
			return 1;
		}else{
			return $this->failed_attempts($user);
		}
	}
	public function forgot_password(){
		$this->db->prepare("SELECT name_one,number_answer_allowed,new_password_sent_email,email_host,email_port,email_security_smtp,email_type_security_smtp,email_user,email_password,email_subject,email_message FROM ".PREFIX."torganization ;");
		$this->db->execute();
		$cfg = $this->db->fetchAll()[0];
		$this->db->prepare("SELECT u.iduser,p.identification_card,dqa.answer,p.email FROM ".PREFIX."tuser u LEFT JOIN ".PREFIX."tdquestion_answer dqa ON u.iduser=dqa.iduser INNER JOIN ".PREFIX."tperson p ON u.idperson=p.idperson WHERE u.name=? OR p.email=? ;");
		$this->db->execute(array($this->name,$this->name));
		$d=$this->db->fetchAll();
		$a=0;
		foreach ($d as $k1 => $val) {
			if(crypt($this->answer[$k1],$val["answer"]) == $val["answer"]){
				$a++;
			}
		}
		if($a>=count($cfg["number_answer_allowed"])){
			$new_password = $d[0]["identification_card"];
			if($cfg["new_password_sent_email"]=="1"){
				require 'third_party/PHPMailer/PHPMailerAutoload.php';
				$this->mailer = new \PHPMailer;
				$this->mailer->Host = $cfg["email_host"];
				$this->mailer->Port = $cfg["email_port"];
				$this->mailer->IsSMTP();
				if($cfg["email_security_smtp"]=='1'){
					$this->mailer->SMTPAuth = $cfg["email_security_smtp"]=='1'? True : False;
					$this->mailer->SMTPSecure = $cfg["email_type_security_smtp"];
				}
				$this->mailer->Username = $cfg["email_user"];
				$this->mailer->Password = $cfg["email_password"];
				$this->mailer->from = $cfg["email_user"];
				$this->mailer->FromName = $cfg["name_one"];
				//$this->mailer->SMTPDebug = 2;
				$this->mailer->AddAddress($d[0]["email"]);
				$this->mailer->Subject = $cfg["email_subject"];
				$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
				$new_password="";
				for($i=0;$i<9;$i++){ $new_password .= substr($str,rand(0,strlen($str)),1); }
				$message = str_replace(":password", $new_password, $cfg["email_message"]);
				$this->mailer->Body = $message;
				if(!$this->mailer->send()){
		    		echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
		    		return false;
				}
			}
			$this->db->prepare("UPDATE ".PREFIX."tdpassword SET status='0' WHERE iduser='".$d[0]["iduser"]."'");
			if($this->db->execute()){
				$this->db->prepare("INSERT INTO ".PREFIX."tdpassword (iduser,password,creation_date,status) VALUES ('".$d[0]["iduser"]."','".$this->encrypter($new_password)."',NOW(),'1') ;");
				if($this->db->execute()){
					$this->db->prepare("UPDATE ".PREFIX."tuser SET initiated='0' WHERE iduser='".$d[0]["iduser"]."';");
					return $this->db->execute();
				}
			}
		}else{
			return false;
		}
	}
	private function failed_attempts($user){
		$this->db->prepare("SELECT failed_attempts FROM ".PREFIX."tuser WHERE name=? ");
		$this->db->execute(array($this->name));
		$user = $this->db->fetchAll();
		if($user[0]["failed_attempts"] < 5){
			$this->db->prepare("UPDATE ".PREFIX."tuser SET failed_attempts=failed_attempts+1 WHERE name=? ");
			$this->db->execute(array($this->name));
			return 2;
		}else{
			$this->db->prepare("UPDATE ".PREFIX."tuser SET failed_attempts='0',status='0' WHERE name=? ");
			$this->db->execute(array($this->name));
			return 3;
		}
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT u.iduser,u.name,CONCAT(n.name_one,'-',p.identification_card,' ',p.name_one,' ',p.last_name_one) as person,u.status,(SELECT count(*) FROM ".PREFIX."tuser) as countx FROM ".PREFIX."tuser u INNER JOIN ".PREFIX."tperson p ON u.idperson=p.idperson INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality WHERE CAST(iduser as CHAR) LIKE '%$search%' OR name LIKE '%$search%' ORDER BY iduser DESC LIMIT $length OFFSET $start ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($c as $key => $val) {
			$d["data"][$key]["iduser"] = $val["iduser"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["person"] = $val["person"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["iduser"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];;
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT p.idperson,CONCAT(n.name_one,'-',p.identification_card,' ',p.name_one,' ',p.last_name_one) as person FROM ".PREFIX."tperson p INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality INNER JOIN ".PREFIX."tuser u ON p.idperson<>u.idperson WHERE p.status='1';");
		$dependencies["persons_not_user"] = $this->db->execute();
		$this->db->prepare("SELECT p.idperson,CONCAT(n.name_one,'-',p.identification_card,' ',p.name_one,' ',p.last_name_one) as person FROM ".PREFIX."tperson p INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality WHERE p.status='1';");
		$dependencies["persons"] = $this->db->execute();
		$this->db->prepare("SELECT * FROM ".PREFIX."tcharge WHERE status='1';");
		$dependencies["charges"] = $this->db->execute();
		$this->db->prepare("SELECT * FROM ".PREFIX."torganization ;");
		$this->db->execute();
		$dependencies["organization"] = $this->db->fetchAll();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tuser (idperson,name,initiated,status) VALUES (?,?,'0','1');");
		if($this->db->execute(array($this->idperson,strtolower($this->name)))){
			$this->db->prepare("SELECT identification_card FROM ".PREFIX."tperson WHERE idperson=?;");
			$this->db->execute(array($this->idperson));
			$d=$this->db->fetchAll();
			$this->db->prepare("INSERT INTO ".PREFIX."tdpassword (iduser,password,creation_date,status) VALUES ((SELECT iduser FROM ".PREFIX."tuser WHERE idperson=?),'".$this->encrypter($d[0]["identification_card"])."',NOW(),'1');");
			return $this->db->execute(array($this->idperson));
		}else{
			return false;
		}
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tuser WHERE iduser=? ;");
		$this->db->execute(array($this->iduser));
		return $this->db->fetchAll()[0];
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tuser SET idperson=? WHERE iduser=?;");
		return $this->db->execute(array($this->idperson,$this->iduser));
	}
	public function reset_password(){
		$this->db->prepare("UPDATE ".PREFIX."tdpassword SET status='0' WHERE iduser=?;");
		if($this->db->execute(array($this->iduser))){
			$this->db->prepare("SELECT p.identification_card FROM ".PREFIX."tuser u INNER JOIN ".PREFIX."tperson p ON u.idperson=p.idperson WHERE u.iduser=?");
			$this->db->execute(array($this->iduser));
			$d=$this->db->fetchAll();
			$this->db->prepare("INSERT INTO ".PREFIX."tdpassword (iduser,password,creation_date,status) VALUES (?,?,NOW(),'1')");
			$this->db->execute(array($this->iduser,$this->encrypter($d[0]["identification_card"])));
			$this->db->prepare("UPDATE ".PREFIX."tuser SET initiated='0' WHERE iduser=?");
			return $this->db->execute(array($this->iduser));
		}
	}
	public function initiated(){
		$this->db->prepare("UPDATE ".PREFIX."tuser SET initiated='1' WHERE iduser=?");
		return $this->db->execute(array($this->iduser));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tduser_service_action WHERE iduser=?;");
		if($this->db->execute(array($this->iduser))){
			$this->db->prepare("DELETE FROM ".PREFIX."tdpassword WHERE iduser=?;");
			if($this->db->execute(array($this->iduser))){
				$this->db->prepare("DELETE FROM ".PREFIX."tuser WHERE iduser=?;");
				return $this->db->execute(array($this->iduser));
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tuser SET status=? WHERE iduser=?;");
		return $this->db->execute(array($num,$this->iduser));
	}
	public function pdf(){
		$this->db->prepare("SELECT u.iduser,u.name,CONCAT(n.name_one,'-',p.identification_card,' ',p.name_one,' ',p.last_name_one) as person,u.status FROM ".PREFIX."tuser u INNER JOIN ".PREFIX."tperson p ON u.idperson=p.idperson INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function query_note(){
		$this->db->prepare("SELECT note FROM ".PREFIX."tuser WHERE iduser=?;");
		$this->db->execute(array($this->iduser));
		return $this->db->fetchAll()[0];
	}
	public function note(){
		$this->db->prepare("UPDATE ".PREFIX."tuser SET note=? WHERE iduser=?;");
		return $this->db->execute(array($this->note,$this->iduser));	
	}
	public function query_profile(){
		$this->db->prepare("SELECT p.idperson,p.idnationality,CONCAT(n.name_one,' ',n.name_two) as nationality,p.idcharge,p.idethnicity,e.name as ethnicity,p.image,p.identification_card,p.name_one,p.name_two,p.last_name_one,p.last_name_two,p.sex,p.email,DATE_FORMAT(p.birth_date,'%d-%m-%Y') as birth_date,birth_place,p.idaddress,CONCAT(pa.name,' - ',m.name,' - ',s.name,' - ',c.name) as full_address,p.address,p.phone_one,p.phone_two,dqa.question,dqa.answer FROM ".PREFIX."tuser u LEFT JOIN ".PREFIX."tdquestion_answer dqa ON u.iduser=dqa.iduser INNER JOIN ".PREFIX."tperson p ON u.idperson=p.idperson INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality INNER JOIN ".PREFIX."tethnicity e ON p.idethnicity=e.idethnicity INNER JOIN ".PREFIX."taddress pa ON p.idaddress=pa.idaddress INNER JOIN ".PREFIX."taddress m ON pa.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress WHERE u.iduser=? ;");
		$this->db->execute(array($this->iduser));
		return $this->db->fetchAll();
	}
	public function query_questions_answers(){
		$this->db->prepare("SELECT dqa.question FROM ".PREFIX."tuser u LEFT JOIN ".PREFIX."tdquestion_answer dqa ON u.iduser=dqa.iduser INNER JOIN ".PREFIX."tperson p ON u.idperson=p.idperson WHERE u.name=? OR p.email=? ;");
		$this->db->execute(array($this->name,$this->name));
		return $this->db->fetchAll();
	}
	public function required_password(){
		$this->db->prepare("SELECT password FROM ".PREFIX."tdpassword WHERE iduser=? AND status='1' ");
		$data = $this->db->execute(array($this->iduser));
		foreach ($data as $val) {
			return $val["password"];
		}
	}
	public function new_password(){
		$this->db->prepare("UPDATE ".PREFIX."tdpassword SET status='0' WHERE iduser=?;");
		if($this->db->execute(array($this->iduser))){
			$this->db->prepare("INSERT INTO ".PREFIX."tdpassword (iduser,password,creation_date,status) VALUES (?,?,NOW(),'1');");
			return $this->db->execute(array($this->iduser,$this->encrypter($this->password)));
		}else{
			return false;
		}
	}
	public function del_question_answer(){
		$this->db->prepare("DELETE FROM ".PREFIX."tdquestion_answer WHERE iduser=?;");
		return $this->db->execute(array($this->iduser));
	}
	public function add_question_answer(){
		$this->db->prepare("INSERT INTO ".PREFIX."tdquestion_answer(iduser,question,answer) VALUES (?,?,?)");
		return $this->db->execute(array($this->iduser,$this->question,$this->encrypter($this->answer)));
	}
}
?>