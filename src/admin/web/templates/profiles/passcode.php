{% extends "base.html" %}

{% block title %}activeMDM{% endblock %}

{% block content %}

<div class="container">
	{% if profile._id is defined %}
	<form role="form" action="{{ urlFor('update_profile', {'profile_id': profile._id}) }}" method="POST" enctype="multipart/form-data">
		<input name="_id" type="hidden" value="{{ profile._id }}">
	{% else %}
	<form role="form" action="{{ urlFor('create_profile') }}" method="POST" enctype="multipart/form-data">
	{% endif %}
		<input name="type" type="hidden" value="passcode">
		<div class="form-group">
			<label for="access_rights">
				<strong>Allow Simple Value</strong>
			</label>
			<input name="allowSimple" type="checkbox" value="{{ profile.allowSimple }}"/>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Require alphanumeric value</strong>
			</label>
			<input name="requireAlphanumeric" type="checkbox" value="{{ profile.requireAlphanumeric }}"/>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Minimum password length</strong>
			</label>
			
			<select name="minLength">
				<option value="" {% if profile.minlength is defined %}selected{% endif %}>--</option>
				<option value="1" {% if profile.minlength == 1 %}selected{% endif %}>1</option>
				<option value="2" {% if profile.minlength == 2 %}selected{% endif %}>2</option>
				<option value="3" {% if profile.minlength == 3 %}selected{% endif %}>3</option>
				<option value="4" {% if profile.minlength == 4 %}selected{% endif %}>4</option>
				<option value="5" {% if profile.minlength == 5 %}selected{% endif %}>5</option>
				<option value="6" {% if profile.minlength == 6 %}selected{% endif %}>6</option>
				<option value="7" {% if profile.minlength == 7 %}selected{% endif %}>7</option>
				<option value="8" {% if profile.minlength == 8 %}selected{% endif %}>8</option>
				<option value="9" {% if profile.minlength == 9 %}selected{% endif %}>9</option>
				<option value="10" {% if profile.minlength == 10 %}selected{% endif %}>10</option>
				<option value="11" {% if profile.minlength == 11 %}selected{% endif %}>11</option>
				<option value="12" {% if profile.minlength == 12 %}selected{% endif %}>12</option>
				<option value="13" {% if profile.minlength == 13 %}selected{% endif %}>13</option>
				<option value="14" {% if profile.minlength == 14 %}selected{% endif %}>14</option>
				<option value="15" {% if profile.minlength == 15 %}selected{% endif %}>15</option>
				<option value="16" {% if profile.minlength == 16 %}selected{% endif %}>16</option>
			</select>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Minimum number of complex characters</strong>
			</label>
			
			<select name="minComplexChars">
				<option value="" {% if profile.minComplexChars is defined %}selected{% endif %}>--</option>
				<option value="1" {% if profile.minComplexChars == 1 %}selected{% endif %}>1</option>
				<option value="2" {% if profile.minComplexChars == 2 %}selected{% endif %}>2</option>
				<option value="3" {% if profile.minComplexChars == 3 %}selected{% endif %}>3</option>
				<option value="4" {% if profile.minComplexChars == 4 %}selected{% endif %}>4</option>
			</select>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Maximum passcode age (1-730 days, or none)</strong>
			</label>
			
			<input name="maxPINAgeInDays" type="text" value="{{ profile.maxPINAgeInDays }}"/>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Minimum auto-lock</strong>
			</label>
			
			<select name="maxInactivity">
				<option value="" {% if profile.maxInactivity is defined %}selected{% endif %}>--</option>
				<option value="1" {% if profile.maxInactivity == 1 %}selected{% endif %}>1 minute</option>
				<option value="2" {% if profile.maxInactivity == 2 %}selected{% endif %}>2 minutes</option>
				<option value="3" {% if profile.maxInactivity == 3 %}selected{% endif %}>3 minutes</option>
				<option value="4" {% if profile.maxInactivity == 4 %}selected{% endif %}>4 minutes</option>
				<option value="5" {% if profile.maxInactivity == 5 %}selected{% endif %}>4 minutes</option>
			</select>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Passcode history (1-50 passcodes, or none)</strong>
			</label>
			
				<input name="pinHistory" type="text" value="{{ profile.pinHistory }}"/>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Minimum grace period for device lock</strong>
			</label>
			
			<select name="maxGracePeriod">
				<option value="" {% if profile.maxGracePeriod is not defined %}selected{% endif %}>--</option>
				<option value="0" {% if profile.maxGracePeriod is defined and profile.maxGracePeriod == 0 %}selected{% endif %}>Immediately</option>
				<option value="1" {% if profile.maxGracePeriod == 2 %}selected{% endif %}>1 minute</option>
				<option value="5" {% if profile.maxGracePeriod == 3 %}selected{% endif %}>5 minutes</option>
				<option value="15" {% if profile.maxGracePeriod == 4 %}selected{% endif %}>15 minutes</option>
				<option value="60" {% if profile.maxGracePeriod == 5 %}selected{% endif %}>1 hour</option>
				<option value="240" {% if profile.maxGracePeriod == 5 %}selected{% endif %}>4 hours</option>
			</select>
		</div>
		<div class="form-group">
			<label for="access_rights">
				<strong>Maximum number of failed attempts</strong>
			</label>
			
			<select name="maxFailedAttempts">
				<option value="" {% if profile.maxFailedAttempts is defined %}selected{% endif %}>--</option>
				<option value="2" {% if profile.maxFailedAttempts == 2 %}selected{% endif %}>2</option>
				<option value="3" {% if profile.maxFailedAttempts == 3 %}selected{% endif %}>3</option>
				<option value="4" {% if profile.maxFailedAttempts == 4 %}selected{% endif %}>4</option>
				<option value="5" {% if profile.maxFailedAttempts == 5 %}selected{% endif %}>5</option>
				<option value="6" {% if profile.maxFailedAttempts == 6 %}selected{% endif %}>6</option>
				<option value="7" {% if profile.maxFailedAttempts == 7 %}selected{% endif %}>7</option>
				<option value="8" {% if profile.maxFailedAttempts == 8 %}selected{% endif %}>8</option>
				<option value="9" {% if profile.maxFailedAttempts == 9 %}selected{% endif %}>9</option>
				<option value="10" {% if profile.maxFailedAttempts == 10 %}selected{% endif %}>10</option>
			</select>
		</div>
	</form>
</div>


{% endblock %}
