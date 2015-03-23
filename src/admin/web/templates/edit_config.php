
{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}



<div class="container">
	<form role="form" action="{{ urlFor('save_config') }}" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="access_rights">
				Access Rights
			</label>
			<input name="access_rights" class="form-control" type="text" value="{{ config.access_rights }}"/>
		</div>
		<div class="form-group">
			<label for="organisation_name">
				Organisation Name
			</label>
			<input name="organisation_name" class="form-control" type="text" value="{{ config.organisation_name }}"/>
		</div>
		<div class="form-group">
			<label for="master_profile_uuid">
				Master Profile UUID
			</label>
			<input name="master_profile_uuid" class="form-control" type="text" value="{{ config.master_profile_uuid }}"/>
		</div>
		<div class="form-group">
			<label for="cert_uuid">
				Certificate UUID
			</label>
			<input name="cert_uuid" class="form-control" type="text" value="{{ config.cert_uuid }}"/>
		</div>	
		<div class="form-group">
			<label for="mdm_uuid">
				MDM Profile UUID
			</label>
			<input name="mdm_uuid" class="form-control" type="text" value="{{ config.mdm_uuid }}"/>
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
			<input name="mdm_certificate_password" class="form-control" type="text" value="{{ config.mdm_certificate_password }}"/>
		</div>	
		<div class="form-group">
			<label for="mdm_topic">
				MDM Topic
			</label>
			<input name="mdm_topic" class="form-control" type="text" value="{{ config.mdm_topic }}"/>
		</div>	
		<div class="form-group">
			<label for="check_in_url">
				Check In URL
			</label>
			<input name="check_in_url" class="form-control" type="text" value="{{ config.check_in_url }}"/>
		</div>	
		<div class="form-group">
			<label for="service_url">
				Service URL
			</label>
			<input name="service_url" class="form-control" type="text" value="{{ config.service_url }}"/>
		</div>	
		<button type="submit" class="btn btn-success">Submit</button>
	</form>

</div>

{% endblock %}
