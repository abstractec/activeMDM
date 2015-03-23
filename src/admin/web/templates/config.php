{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<strong>Setting</strong>
		</div>
		<div class="col-md-4">
			<strong>Value</strong>
		</div>
	</div>

      

	<div class="row">
		<div class="col-md-3">
			Access Rights
		</div>
		<div class="col-md-4">
			{{ config.access_rights }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			Organisation Name
		</div>
		<div class="col-md-4">
			{{ config.organisation_name }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			Master Profile UUID
		</div>
		<div class="col-md-4">
			{{ config.master_profile_uuid }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			Certificate UUID
		</div>
		<div class="col-md-4">
			{{ config.cert_uuid }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Profile UUID
		</div>
		<div class="col-md-4">
			{{ config.mdm_uuid }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Certificate
		</div>
		<div class="col-md-4">
			{{ config.mdm_certificate }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Certificate Password
		</div>
		<div class="col-md-4">
			{{ config.mdm_certificate_password }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Topic
		</div>
		<div class="col-md-4">
			{{ config.mdm_topic }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			Check In URL
		</div>
		<div class="col-md-4">
			{{ config.check_in_url }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			Service URL
		</div>
		<div class="col-md-4">
			{{ config.service_url }}
		</div>
	</div>	
</div>



{% endblock %}
$profiles