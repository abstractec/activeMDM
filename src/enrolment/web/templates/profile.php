<?xml version="1.0"?>
<plist version="1.0">
	<f:view contentType="application/x-apple-aspen-config">
	<dict>
		<key>PayloadContent</key>
		<array>
			<dict>
				<key>AccessRights</key>
				<integer>{{ config.access_rights }}</integer>
				<key>CheckInURL</key>
				<string>{{ config.check_in_url }}</string>
				<key>IdentityCertificateUUID</key>
				<string>{{ config.cert_uuid }}</string>
				<key>PayloadDescription</key>
				<string>Configures Mobile Device Management</string>
				<key>PayloadDisplayName</key>
				<string>Mobile Device Management</string>
				<key>PayloadIdentifier</key>
				<string>com.madpartners.mdm.mdm</string>
				<key>PayloadOrganization</key>
				<string>{{ config.organisation_name }}</string>
				<key>PayloadType</key>
				<string>com.apple.mdm</string>
				<key>PayloadUUID</key>
				<string>{{ config.mdm_uuid }}</string>
				<key>PayloadVersion</key>
				<integer>1</integer>
				<key>ServerURL</key>
				<string>{{ config.service_url }}</string>
				<key>SignMessage</key>
				<false/>
				<key>Topic</key>
				<string>{{ config.mdm_topic }}</string>
				<key>UseDevelopmentAPNS</key>
				<false/>
				<key>CheckOutWhenRemoved</key>
				<true/>
			</dict>
			<dict>
				<key>Password</key>
				<string>{{ config.mdm_certificate_password }}</string>
				<key>PayloadCertificateFileName</key>
				<string>eas.p12</string>
				<key>PayloadContent</key>
				<data>
					{{ config.mdm_certificate }}
				</data>
				<key>PayloadDescription</key>
				<string>Provides device authentication (certificate or identity).</string>
				<key>PayloadDisplayName</key>
				<string>eas.p12</string>
				<key>PayloadIdentifier</key>
				<string>uk.co.abstractec.mdm.cert</string>
				<key>PayloadOrganization</key>
				<string>{{ config.organisation_name }}</string>
				<key>PayloadType</key>
				<string>com.apple.security.pkcs12</string>
				<key>PayloadUUID</key>
				<string>{{ config.cert_uuid }}</string>
				<key>PayloadVersion</key>
				<integer>1</integer>
			</dict>
		</array>
		<key>PayloadDescription</key>
		<string>MDM Payload - Configures Mobile Device Management Services</string>
		<key>PayloadDisplayName</key>
		<string>activeMDM Payload</string>
		<key>PayloadIdentifier</key>
		<string>uk.co.abstractec.eas.mdm</string>
		<key>PayloadOrganization</key>
		<string>{{ config.organisation_name }}</string>
		<key>PayloadRemovalDisallowed</key>
		<false/>
		<key>PayloadType</key>
		<string>Configuration</string>
		<key>PayloadUUID</key>
		<string>{{ config.master_profile_uuid }}</string>
		<key>PayloadVersion</key>
		<integer>1</integer>
	</dict>
</plist>
