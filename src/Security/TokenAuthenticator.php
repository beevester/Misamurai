<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;


class TokenAuthenticator extends AbstractGuardAuthenticator
{
    public function supports(Request $request)
    {
           
        return $request->headers->has('AUTHENTICATE');
    }

    public function getCredentials(Request $request)
    {
     
        return array(
          'token' => $request->headers->get('X-AUTH-TOKEN'),
        );
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $apikey = $credentials['token'];

        if (null === $apikey) {
          return;
        }

        return $userProvider->loadUserByUsername($apikey);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = [
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_FORBIDDEN);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return null;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = [
            'message' => 'Authentication Required'
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe()
    {
        return false;
    }
}
