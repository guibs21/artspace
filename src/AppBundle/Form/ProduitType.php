<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('offer', 'entity', array(
                'class' => 'AppBundle:Offers',
                'property' => 'name',
                'empty_value' => '',
                'multiple' => false,
            ))
            ->add('option1', 'text')
            ->add('option1Detail', 'text')
            ->add('option2', 'text')
            ->add('option2Detail', 'text')
            ->add('option3', 'text')
            ->add('option3Detail', 'text')
            ->add('option4', 'text')
            ->add('option4Detail', 'text')
            ->add('option5', 'text')
            ->add('option5Detail', 'text')
            ->add('option6', 'text')
            ->add('option6Detail', 'text')
            ->add('option7', 'text')
            ->add('option7Detail', 'text')
            ->add('option8', 'text')
            ->add('option8Detail', 'text')
            ->add('option9', 'text')
            ->add('option9Detail', 'text')
            ->add('option10', 'text')
            ->add('option10Detail', 'text')
            ->add('Enregistrer', 'submit', array(
                "attr" => array(
                    "formnovalidate" => "formnovalidate"
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Products'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_products';
    }
}
