<?php

namespace Cuantic\PricingBundle\Form\Type;

use Oro\Bundle\CurrencyBundle\Form\Type\CurrencySelectionType;
use OroB2B\Bundle\AccountBundle\Form\Type\AccountUserMultiSelectType;
use OroB2B\Bundle\ProductBundle\Form\Type\ProductAutocompleteType;
use OroB2B\Bundle\ProductBundle\Form\Type\ProductSelectType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MassPriceChangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', 'text', ['required' => true])
            ->add('percentage', 'number', ['scale' => 4])
            ->add('currency', CurrencySelectionType::NAME)
            ->add('referenceExchangeRate', 'number', ['scale' => 4 ])
            ->add('products', 'genemu_jqueryselect2_entity',
                [
                    'required' => false,
                    'multiple' => true,
                    'label'    => 'Products',
                    'class'    => 'OroB2B\Bundle\ProductBundle\Entity\Product',
                    'configs'  => ['placeholder' => 'Select Products'],
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cuantic\PricingBundle\Entity\MassPriceChange',
        ));
    }

    public function getName()
    {
        return 'pricing_mass_price_change';
    }
}