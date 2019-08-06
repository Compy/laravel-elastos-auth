<?php
/**
 * Created by PhpStorm.
 * User: compy
 * Date: 2019-08-05
 * Time: 16:55
 */

namespace Compy\LaravelElastosAuth;

use Elliptic\EC;

class LaravelElastosAuth
{
    protected $privateKey;
    protected $publicKey;
    protected $appId;
    protected $did;
    protected $appName;

    public function __construct()
    {
    }

    /**
     * Generate an authentication request and QR code to pass to the user to scan
     * @param $scope array
     * @param $callbackUrl string
     * @param null $realm string
     * @return ElaAuthenticationRequest
     */
    public function generateAuthenticationRequest($scope, $callbackUrl, $realm = null)
    {
        $ec = new EC('p256');
        $priv = $ec->keyFromPrivate($this->privateKey);
        $sig = $priv->sign($this->appId)->toDER('hex');

        // Generate a random number for state tracking and save it to our session so the AJAX frontend
        // can reference it
        $random = rand(10000000000,999999999999);

        $realm = $realm ?? 'Elastos DID Authentication';

        $urlParams = [
            'CallbackUrl'   => $callbackUrl,
            'Description'   => $realm,
            'AppID'         => $this->appId,
            'PublicKey'     => $this->publicKey,
            'Signature'     => $sig,
            'DID'           => $this->did,
            'RandomNumber'  => $random,
            'AppName'       => $this->appName,
            'RequestInfo'   => implode(',', $scope)
        ];

        $url = 'elaphant://identity?' . http_build_query($urlParams);

        $authRequest = new ElaAuthenticationRequest($random, implode(',', $scope), $url, $callbackUrl);
        return $authRequest;
    }

    /**
     * A convenience method to quickly set all application authentication parameters
     *
     * @param $publicKey
     * @param $privateKey
     * @param $appId
     * @param $did
     * @param $appName
     */
    public function setCredentials($publicKey, $privateKey, $appId, $did, $appName)
    {
        $this->setPublicKey($publicKey);
        $this->setPrivateKey($privateKey);
        $this->setAppId($appId);
        $this->setDid($did);
        $this->setAppName($appName);
    }

    /**
     * Gets the application's private key issued by Elastos
     * @return mixed
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Sets the application's private key issued by Elastos
     * @param mixed $privateKey
     */
    public function setPrivateKey($privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * Gets the application's public key issued by Elastos
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * Sets the application's public key issued by Elastos
     * @param mixed $publicKey
     */
    public function setPublicKey($publicKey): void
    {
        $this->publicKey = $publicKey;
    }

    /**
     * Gets the application's ID
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Sets the application's ID
     * @param mixed $appId
     */
    public function setAppId($appId): void
    {
        $this->appId = $appId;
    }

    /**
     * Gets the application's DID issued by Elastos
     * @return mixed
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Sets the application's DID issued by Elastos
     * @param mixed $did
     */
    public function setDid($did): void
    {
        $this->did = $did;
    }

    /**
     * Gets the application's name
     * @return mixed
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * Sets the application's name
     * @param mixed $appName
     */
    public function setAppName($appName): void
    {
        $this->appName = $appName;
    }
}
