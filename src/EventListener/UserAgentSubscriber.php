<?php
namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class UserAgentSubscriber implements EventSubscriberInterface
{
   /** @var  TokenStorageInterface */
    protected $tokenStorage;


    /** @var  SessionInterface */
    protected $session;

    /** @var  RouterInterface */
    protected $router;



   /**
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface $session
     * @param RouterInterface $router
     */

      public function __construct(
        TokenStorageInterface $tokenStorage,
        SessionInterface $session,
        RouterInterface $router
        ) 
    {
        $this->tokenStorage = $tokenStorage;
        $this->session = $session;
        $this->router = $router;
    }


    public function onKernelRequest(RequestEvent $event)
    {
        $session = new Session();
        $token_expire = $session->get('token_expire');
        $now=new \DateTime();
        //dump('session expire '.$this->session->getMetadataBag()->getLifetime());
        //dd( 'expire '.date('Y-m-d H:i:s',$token_expire)." ahora ".date('Y-m-d H:i:s',$now->getTimestamp()) );
        if( $token_expire <= $now->getTimestamp())
        {
	        //https://gist.github.com/slavafomin/4e0b70a39d1cff23af0f
	        $this->tokenStorage->setToken(null);
	        $this->session->invalidate();        	
        	return new RedirectResponse('oauth_login');
        }

    }
    
    public static function getSubscribedEvents()
    {
        return [
            RequestEvent::class => 'onKernelRequest'
        ];
    }
}
?>
