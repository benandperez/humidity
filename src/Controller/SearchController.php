<?php

namespace App\Controller;

use App\Entity\History;
use App\Form\SearchType;
use App\Services\SaveHistory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/", name="search")
     */
    public function index(Request $request, SaveHistory $saveHistory): Response
    {
        $form = $this->createForm(SearchType::class, null);
        $form->handleRequest($request);

        $history = new History();

        if ($form->isSubmitted() && $form->isValid()) {
            $history = $saveHistory->searchData($form->getData());
        }

        return $this->renderForm('search/index.html.twig', [
            'history' => $history,
            'form' => $form,
        ]);
    }
}
