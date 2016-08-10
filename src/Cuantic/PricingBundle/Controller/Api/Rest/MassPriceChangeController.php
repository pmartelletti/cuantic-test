<?php
namespace Cuantic\PricingBundle\Controller\Api\Rest;

use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SoapBundle\Controller\Api\Rest\RestController;

/**
 * @RouteResource("mass_price_change")
 * @NamePrefix("pricing_api_")
 */
class MassPriceChangeController extends RestController
{
    /**
     * @Acl(
     *      id="pricing.mass_price_change_delete",
     *      type="entity",
     *      class="CuanticPricingBundle:MassPriceChange",
     *      permission="DELETE"
     * )
     */
    public function deleteAction($id)
    {
        return $this->handleDeleteRequest($id);
    }

    public function getForm()
    {
    }

    public function getFormHandler()
    {
    }

    public function getManager()
    {
        return $this->get('pricing.mass_price_change_manager.api');
    }
}
