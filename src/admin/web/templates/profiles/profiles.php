{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}

<div class="container">
	{% for profile in profiles %}
	<div class="row">
		<div class="col-md-3">
			<strong>Setting</strong>
		</div>
		<div class="col-md-4">
			<strong>Value</strong>
		</div>
	</div>
	{% endfor %}
	
	<a href="{{ urlFor('new_profile') }}">Create New</a>
</div>

{% endblock %}
