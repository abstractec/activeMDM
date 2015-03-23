{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}

And this is were you can:

<ul>
	<li><a href="{{ siteUrl('/config') }}">Edit the config</a></li>
	<li>See the enrolled devices <em>[TBC]</em></li>
	<li><a href="{{ siteUrl('/profiles') }}">See the profiles</a></li>
	<li>See the current state of the queue <em>[TBC]</em></li>
</ul>

{% endblock %}
