<plist version="1.0">
	<dict>
		<key>PayloadContent</key>
		<array>
			<dict>
				<key>AccessRights</key>
				<integer>{{ config.accessRights }}</integer>
				<key>CheckInURL</key>
				<string>{{ config.rootURL }}/service/index.php/checkin</string>
				<key>IdentityCertificateUUID</key>
				<string>{{ config.certUUID }}</string>
				<key>PayloadDescription</key>
				<string>Configures Mobile Device Management</string>
				<key>PayloadDisplayName</key>
				<string>Mobile Device Management</string>
				<key>PayloadIdentifier</key>
				<string>com.activemdm.enrolment</string>
				<key>PayloadOrganization</key>
				<string>{{ config.organisationName }}</string>
				<key>PayloadType</key>
				<string>com.apple.mdm</string>
				<key>PayloadUUID</key>
				<string>{{ config.mdmUUID }}</string>
				<key>PayloadVersion</key>
				<integer>1</integer>
				<key>ServerURL</key>
				<string>{{ config.rootURL }}/service/index.php/</string>
				<key>SignMessage</key>
				<false/>
				<key>Topic</key>
				<string>{{ config.pushTopic }}</string>
				<key>UseDevelopmentAPNS</key>
				<false/>
				<key>CheckOutWhenRemoved</key>
				<true/>
			</dict>
			<dict>
				<key>Password</key>
				<string>{{ config.mdmCertificatePassword }}</string>
				<key>PayloadCertificateFileName</key>
				<string>eas.p12</string>
				<key>PayloadContent</key>
				<data>
					{{ config.mdmCertificate }}
				</data>
				<key>PayloadDescription</key>
				<string>Provides device authentication (certificate or identity).</string>
				<key>PayloadDisplayName</key>
				<string>eas.p12</string>
				<key>PayloadIdentifier</key>
				<string>uk.co.abstractec.mdm.cert</string>
				<key>PayloadOrganization</key>
				<string>{{ config.organisationName }}</string>
				<key>PayloadType</key>
				<string>com.apple.security.pkcs12</string>
				<key>PayloadUUID</key>
				<string>{{ config.certUUID }}</string>
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
		<string>{{ config.organisationName }}</string>
		<key>PayloadRemovalDisallowed</key>
		<false/>
		<key>PayloadType</key>
		<string>Configuration</string>
		<key>PayloadUUID</key>
		<string>{{ config.masterProfileUUID }}</string>
		<key>PayloadVersion</key>
		<integer>1</integer>
	</dict>
</plist>
