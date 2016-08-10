<?php

namespace Cuantic\PricingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Oro\Bundle\UserBundle\Form\Type\UserMultiSelectType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductMultiSelectType extends AbstractType
{
    const NAME = 'cuantic_pricing_product_multiselect';

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'converter' => $this->converter,
                'configs' => array(
                    'properties' => array(),
                    'route_name' => 'orob2b_frontend_autocomplete_search',
                    'route_parameters' => [
                        'name' => 'orob2b_product_visibility_limited',
                    ],
                    'entity_class' => 'CuanticPricingBundle'
                )
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'oro_jqueryselect2_hidden';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return static::NAME;
    }
}