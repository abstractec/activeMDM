<?php
class Config {
	public $id;
    public $mdmCertificate;
    public $mdmCertificatePassword;
    public $accessRights;
    public $organisationName;
    public $masterProfileUUID;
    public $certUUID;
    public $mdmUUID;
    public $pushTopic;
    public $rootURL;

    public function getValues() {
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

    public function setValues($values) {
        $this->accessRights = $values["access_rights"];
        $this->organisationName = $values["organisation_name"];
        $this->accessRights = $values["master_profile_uuid"];
        $this->certUUID = $values["cert_uuid"];
        $this->mdmUUID = $values["mdm_uuid"];
        $this->mdmCertificatePassword = $values["mdm_certificate_password"];
        $this->pushTopic = $values["mdm_topic"];

        if (isset($values["root_url"])) {
                $this->rootURL = $values["root_url"];
		}

        $this->mdmCertificate = $values["mdm_certificate"];
        
        return null;  
    }
}
	
	
?>