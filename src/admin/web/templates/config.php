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
			{{ config.accessRights }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			Organisation Name
		</div>
		<div class="col-md-4">
			{{ config.organisationName }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			Master Profile UUID
		</div>
		<div class="col-md-4">
			{{ config.masterProfileUUID }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			Certificate UUID
		</div>
		<div class="col-md-4">
			{{ config.certUUID }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Profile UUID
		</div>
		<div class="col-md-4">
			{{ config.mdmUUID }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Certificate
		</div>
		<div class="col-md-4">
			{{ config.mdmCertificate }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Certificate Password
		</div>
		<div class="col-md-4">
			{{ config.mdmCertificatePassword }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			MDM Topic
		</div>
		<div class="col-md-4">
			{{ config.pushTopic }}
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			Root URL
		</div>
		<div class="col-md-4">
			{{ config.rootURL }}
		</div>
	</div>	
</div>



{% endblock %}
$profiles