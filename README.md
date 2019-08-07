# laravel-elastos-auth
This package adds Elastos based DID blockchain authentication to your Laravel project.

## Installation
`composer require compy/laravel-elastos-auth`

Then install the autopublish assets:

`php artisan vendor:publish --provider="Compy\LaravelElastosAuth\DIDAuthServiceProvider"`

You need to generate an application ID, encryption keys and a DID by using the Elastos Developer [App DID Wizard](https://elastos.academy/did-wizard)

Your .env file should have the following configuration:
```
ELA_MNEMONIC="<Mnemonic returned by DID wizard>"
ELA_PRIVATE_KEY=<Private key from DID wizard>
ELA_PUBLIC_KEY=<Public key from DID wizard>
ELA_ADDRESS=<Address from DID wizard>
ELA_DID=<DID from wizard>
ELA_APP_NAME=<The app name you entered on the wizard>
ELA_APP_ID=<The app ID returned by the DID wizard>
ELA_CALLBACK="${APP_URL}/elastos/did/callback"
```

It is advised that you leave the callback URL the same as all routes are prefixed with `/elastos`

Run the migrations with

`php artisan migrate`

This will add a `did` column to your users table. You should make the did attribute fillable within your User model.

## Routes
The following routes are added by this package:
* `/elastos/auth` - Main authentication route where you should direct your users to login via Elastos if desired.
* `/elastos/register` - Main registration page where you should direct your users to register via Elastos if desired.

## License
MIT
