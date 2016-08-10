<?php

namespace Cuantic\PricingBundle\Controller;

use Cuantic\PricingBundle\Entity\MassPriceChange;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/mass-price-change")
 */
class MassPriceChangeController extends Controller
{
    /**
     * @Route("/", name="pricing.mass_price_change_index")
     * @Template
     * @Acl(
     *     id="pricing.mass_price_change_view",
     *     type="entity",
     *     class="CuanticPricingBundle:MassPriceChange",
     *     permission="VIEW"
     * )
     */
    public function indexAction()
    {
        return array('gridName' => 'mass-price-changes-grid');
    }

    /**
     * @Route("/create", name="pricing.mass_price_change_create")
     * @Template("CuanticPricingBundle:MassPriceChange:update.html.twig")
     * @Acl(
     *     id="pricing.mass_price_change_create",
     *     type="entity",
     *     class="CuanticPricingBundle:MassPriceChange",
     *     permission="CREATE"
     * )
     */
    public function createAction(Request $request)
    {
        return $this->update(new MassPriceChange(), $request);
    }

    /**
     * @Route("/update/{id}", name="pricing.mass_price_change_update", requirements={"id":"\d+"}, defaults={"id":0})
     * @Template()
     * @Acl(
     *     id="pricing.mass_price_change_update",
     *     type="entity",
     *     class="CuanticPricingBundle:MassPriceChange",
     *     permission="EDIT"
     * )
     */
    public function updateAction(MassPriceChange $change, Request $request)
    {
        return $this->update($change, $request);
    }

    /**
     * @Route("/{id}", name="pricing.mass_price_change_view", requirements={"id"="\d+"})
     * @Template
     * @AclAncestor("pricing.mass_price_change_view")
     */
    public function viewAction(MassPriceChange $change)
    {
        return array('mass_price_change' => $change);
    }

    private function update(MassPriceChange $change, Request $request)
    {
        $form = $this->get('form.factory')->create('pricing_mass_price_change', $change);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($change);
            $entityManager->flush();

            return $this->get('oro_ui.router')->redirectAfterSave(
                array(
                    'route' => 'pricing.mass_price_change_update',
                    'parameters' => array('id' => $change->getId()),
                ),
                array('route' => 'pricing.mass_price_change_index'),
                $change
            );
        }

        return array(
            'entity' => $change,
            'form' => $form->createView(),
        );
    }
}
