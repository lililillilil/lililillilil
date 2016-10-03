<?php

namespace Lilil\Framework\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Main:index.html.twig');
    }

    /**
     * In case root path is asked, redirect to best localized home page
     * (Not sure is the best logical behavior)
     */
    public function redirectAction(Request $request)
    {
        // check language to redirect best localized home page
        $locale = $request->getPreferredLanguage($this->container->getParameter('accepted_languages'));
        if (empty($locale)) {
            $locale = $this->getRequest()->getLocale();
        }

        return $this->redirect($this->generateUrl('home_page', array('locale' => $locale)));
    }
}
