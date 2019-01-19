<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\Cloner\Data;

class HomeController extends AbstractController
{
    /**
     * @var ContactRepository
     */
    private $repository;

    /**
     * @var ObjectManager;
     */
    private $em;

    public function __construct(ContactRepository $repository, ObjectManager $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //Envoie de l'email, à configuer
            /*
            $message = (new \Swift_Message('Email'))
                ->setFrom('//')
                ->setTo('//')
                ->setBody('//');
            
            $mailer->send($message);
            */
            
            $contact->setSendAt(new \DateTime());
            $this->em->persist($contact);
            $this->em->flush();

            $this->addFlash('success', 'Votre message à bien été envoyé !');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView()
        ]);
    }
}
