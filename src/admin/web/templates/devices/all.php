{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}

All devices - soon!

<table>
<th>
	<tr>
		<td><strong>UDID</strong></td>
		<td></td>
		<td><strong>Action</strong></td>
	</tr>
</th>
{% for device in devices %}
	<tr>
		<td>{{ device.udid }}</td>
		<td><a href="{{ urlFor('device_detail', { "udid": device.udid }) }}">Details</a></td>
		<td><a href="{{ urlFor('device_lock', { "udid": device.udid }) }}">Lock Device</a></td>
	</tr>
{% endfor %}
</table>
{% endblock %}
