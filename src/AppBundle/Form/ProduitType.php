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
            ->add('nom')
            ->add('prix')
            ->add('rubrique', 'entity', array(
                'class' => 'AppBundle:Rubrique',
                'property' => 'nom',
                'empty_value' => '',
                'multiple' => false,
            ))
            ->add('option1', 'text')
            ->add('option2', 'text')
            ->add('option3', 'text')
            ->add('option4', 'text')
            ->add('option5', 'text')
            ->add('option6', 'text')
            ->add('option7', 'text')
            ->add('option8', 'text')
            ->add('option9', 'text')
            ->add('option10', 'text')
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
            'data_class' => 'AppBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_produit';
    }
}
