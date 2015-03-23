{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<strong>Name</strong>
		</div>
		<div class="col-md-4">
			<strong>Description</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			Passcode
		</div>
		<div class="col-md-4">
			Configure the passcode requirements of the device
		</div>
		<div class="col-md-1">
			<a href="{{ urlFor('new_passcode_profile') }}" class="btn btn-success">Create</a>
		</div>
	</div>
</div>



{% endblock %}
