<?php
Class Config {
	public $mdmCertificate;
	public $mdmCertificatePassword;
	public $accessRights;
	public $organisationName;
	public $masterProfileUUID;
	public $certUUID;
	public $mdmUUID;
	public $pushTopic;
	public $rootURL;
	public $mdmCertificate;
	
	public array getValues() {
		$ret = array();
		
		$ret["access_rights"] = $this->accessRights;
		$ret["organisation_name"] = $this->$organisationName;
		$ret["master_profile_uuid"] = $this->accessRights;
		$ret["cert_uuid"] = $this->certUUID;
		$ret["mdm_uuid"] = $this->mdmUUID;
		$ret["mdm_certificate_password"] = $this->mdmCertificatePassword;
		$ret["mdm_topic"] = $this->pushTopic;
		$ret["root_url"] = $this->rootURL;
		$ret["mdm_certificate"] = $this->mdmCertificate;
		
		return $ret;
	}
	
	public void setValues($values) {
		$this->accessRights = $ret["access_rights"];
		$this->$organisationName = $ret["organisation_name"];
		$this->accessRights = $ret["master_profile_uuid"];
		$this->certUUID = $ret["cert_uuid"];
		$this->mdmUUID = $ret["mdm_uuid"];
		$this->mdmCertificatePassword = $ret["mdm_certificate_password"];
		$this->pushTopic = $ret["mdm_topic"];
		$this->rootURL = $ret["root_url"];
		$this->mdmCertificate = $ret["mdm_certificate"];
		
	}
}
	
	
?>