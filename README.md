# Instructions

- Update configuration in config.php set redirect_uris and clientnames accordingly
- Run install.php
- If successful share client details with party_b from oauth_clients table
- Update authorize endpoint to include your own login logic and set is_authorized to True if logged in sccessfully


## authorize.php
	This file expects a get request with parameters response_type=code&client_id=testclient&state=xyz. It will return an authorization_code with limited validity for 10 mins.

## access_token.php
	This file expects a post request with parameters grant_type=authorization_code&code=YOUR_CODE and basic authetnication with client_id and client_secret. This will return access_token, expiry, scope and token type

## resource.php
	This file expects a post request with the parameter access_token and runs business logic for returning data