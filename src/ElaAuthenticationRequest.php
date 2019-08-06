<?php
/**
 * Created by PhpStorm.
 * User: compy
 * Date: 2019-07-28
 * Time: 07:59
 */

namespace Compy\LaravelElastosAuth;

class ElaAuthenticationRequest
{
    protected $state;
    protected $scope;
    protected $qrCodeUrl;
    protected $callbackUrl;

    public function __construct($state, $scope, $qrCodeUrl, $callbackUrl)
    {
        $this->state = $state;
        $this->scope = $scope;
        $this->qrCodeUrl = $qrCodeUrl;
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return mixed
     */
    public function getQrCodeUrl()
    {
        return $this->qrCodeUrl;
    }

    /**
     * @return mixed
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

}
