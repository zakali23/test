<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Response;


class Pdf
{
    private $templating;
    private $snappy;

    public function __construct( \Twig_Environment $templating, \Knp\Snappy\Pdf $snappy )
    {
        $this->snappy = $snappy;
        $this->templating = $templating;

    }


    public function pdfAction()
    {
        $this->snappy->setOption("encoding", "UTF-8");
        $this->snappy->setOption('no-outline', true);
        $this->snappy->setOption('disable-javascript', true);



            $html = $this->templating->render('pdf/index.html.twig');

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $this->snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"',

            )
        );

    }

    public function showAction()
    {
            $html = $this->templating->render('pdf/index.html.twig');
            $test ="ceci est un test";


        return new Response(
            $this->snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="Facture_'.date('m/Y').'.pdf"',
                'test' => $test
            )
        );

    }

}