<?php
/**
 * Created by PhpStorm.
 * User: arobichaud
 * Date: 8/17/2016
 * Time: 12:46 PM
 */
$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => '83bmg1sh1jrq5quosrn8mn7n7e',    // The client ID assigned to you by the provider
    'clientSecret'            => 'i6n1b8koffng5giqximk867q7r',   // The client password assigned to you by the provider
    'redirectUri'             => 'http://apo.calypti.ca/login/',
    'urlAuthorize'            => 'http://ngpp.calypti.ca/oauth2/authorize',
    'urlAccessToken'          => 'http://ngpp.calypti.ca/oauth2/access_token'
]);

$existingAccessToken = getUserAccessToken();

if (!empty($existingAccessToken) && $existingAccessToken->hasExpired()) {
    $newAccessToken = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $existingAccessToken->getRefreshToken()
    ]);

    // Purge old access token and store new access token to your data store.
}

// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {

    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();

    // Get the state generated for you and store it to the session.
    $_SESSION['oauth2state'] = $provider->getState();

    // Redirect the user to the authorization URL.
    header('Location: ' . $authorizationUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        // We have an access token, which we may use in authenticated
        // requests against the service provider's API.
        echo $accessToken->getToken() . "\n";
        echo $accessToken->getRefreshToken() . "\n";
        echo $accessToken->getExpires() . "\n";
        echo ($accessToken->hasExpired() ? 'expired' : 'not expired') . "\n";

                // The provider provides a way to get an authenticated API request for
        // the service, using the access token; it returns an object conforming
        // to Psr\Http\Message\RequestInterface.
        $request = $provider->getAuthenticatedRequest(
            'GET',
            'http://ngpp.calypti.ca/users/me',
            $accessToken
        );

        echo $request;

    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());

    }

}