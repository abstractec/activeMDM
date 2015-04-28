
{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}



<div class="container">
	<form role="form" action="{{ urlFor('save_config') }}" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="access_rights">
				Access Rights
			</label>
			<input name="access_rights" class="form-control" type="text" value="{{ config.accessRights }}"/>
		</div>
		<div class="form-group">
			<label for="organisation_name">
				Organisation Name
			</label>
			<input name="organisation_name" class="form-control" type="text" value="{{ config.organisationName }}"/>
		</div>
		<div class="form-group">
			<label for="master_profile_uuid">
				Master Profile UUID
			</label>
			<input name="master_profile_uuid" class="form-control" type="text" value="{{ config.masterProfileUUID }}"/>
		</div>
		<div class="form-group">
			<label for="cert_uuid">
				Certificate UUID
			</label>
			<input name="cert_uuid" class="form-control" type="text" value="{{ config.certUUID }}"/>
		</div>	
		<div class="form-group">
			<label for="mdm_uuid">
				MDM Profile UUID
			</label>
			<input name="mdm_uuid" class="form-control" type="text" value="{{ config.mdmUUID }}"/>
		</div>	
		<div class="form-group">
			<label for="mdm_certificate">
				MDM Certificate
			</label>
			<input type="file" name="mdm_certificate">
			<p class="help-block">This is the exported p12 MDM certificate from your keychain</p>
		</div>	
		<div class="form-group">
			<label for="mdm_certificate_password">
				MDM Certificate Password
			</label>
			<input name="mdm_certificate_password" class="form-control" type="text" value="{{ config.mdmCertificatePassword }}"/>
		</div>	
		<div class="form-group">
			<label for="mdm_topic">
				MDM Topic
			</label>
			<input name="mdm_topic" class="form-control" type="text" value="{{ config.pushTopic }}"/>
		</div>	
		<div class="form-group">
			<label for="root_url">
				Root URL
			</label>
			<input name="root_url" class="form-control" type="text" value="{{ config.rootURL }}"/>
		</div>	
		<button type="submit" class="btn btn-success">Submit</button>
	</form>

</div>

{% endblock %}
