<?php
 
class Service {
    
    private $servicio;
    private $db;
 
    public function __construct() {
		$this->servicio = array();
		$this->db = new PDO('mysql:host=localhost;dbname=shares',"root","");		
	}
 
    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }
    public function setSocialShares($url, $social, $count, $token) {
        self::setNames();
        $sql = "INSERT INTO urlcounts(url, social, count, token) VALUES ('" . $url . "', '" . $social . "', " . $count . ", '" . $token . "')";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	public function getSocialShares($social, $token) {
		self::setNames();
		$sql = "SELECT id, url, count, social FROM urlcounts where social = '$social' and token='$token'";
		foreach ($this->db->query($sql) as $res) {
			$this->servicio =  array ("url" => $res["url"] , "count"=>$res["count"],"social"=>$res["social"]);
		}
		$this->db = null;	
		return $this->servicio;	
	}	
}
?>