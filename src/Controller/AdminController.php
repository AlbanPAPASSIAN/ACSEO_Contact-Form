<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactEditType;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
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
     * @Route("/admin", name="admin")
     */
    public function index(ContactRepository $repository, Request $request)
    {
        $contactNotTreated = $this->repository->findAllNotTreated();        //Récupère l'ensemble des mails non traités
        $contactTreated = $this->repository->findAllTreated();          //Récupère l'ensemble des mails traités

        $contact = new Contact();
        $form = $this->createForm(ContactEditType::class, $contact);

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'contactNotTreated' => $contactNotTreated,
            'contactTreated' => $contactTreated,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/edit/{id}", name="admin.edit")
     */
    public function edit(Contact $contact, ContactRepository $repository, Request $request)
    {
        $form = $this->createForm(ContactEditType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($contact);
            $this->em->flush();
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/edit.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
            'contact' => $contact
        ]);
    }
}
