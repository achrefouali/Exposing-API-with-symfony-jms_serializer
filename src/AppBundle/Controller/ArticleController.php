<?php
/**
 * Created by PhpStorm.
 * User: acf
 * Date: 06/01/2019
 * Time: 17:48
 */

namespace AppBundle\Controller;

use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ArticleController extends  Controller
{
    /**
     * serialise
     * @Route("/articles/show/{id}", name="article_show")
     * @param Article $article
     * @return Response
     */
    public function showAction(Article $article)
    {

        $data = $this->get('jms_serializer')->serialize($article, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }

    /**
     * Deserialise
     * @Route("/articles/create", name="article_create")
     * @Method({"POST"})
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $article = $this->get('jms_serializer')->deserialize($data, 'AppBundle\Entity\Article', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }


    /**
     * @Route("/articles/group/detail/{id}", name="article_group_detail_show")
     *
     * @param Article $article
     * @return Response
     */
    public function showArticleGroupDetailAction(Article $article)
    {
        $data = $this->get('jms_serializer')->serialize($article, 'json', SerializationContext::create()->setGroups(array('detail')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/articles/group/overview/{id}", name="article_group_overview_show")
     * @param Article $article
     * @return Response
     */
    public function showArticleGroupOverviewAction(Article $article)
    {
        $data = $this->get('jms_serializer')->serialize($article, 'json', SerializationContext::create()->setGroups(array('overview')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/articles", name="article_list")
     * @Method({"GET"})
     * @return Response
     */
    public function ListArticleAction()
    {

        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $data = $this->get('jms_serializer')->serialize($articles, 'json', SerializationContext::create()->setGroups(array('list')));

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }




}