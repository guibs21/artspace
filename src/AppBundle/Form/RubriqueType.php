<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RubriqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label'  => 'Ajout rubrique : '))
            ->add('Enregistrer', 'submit', array(
                'label' => 'Ajouter',
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
            'data_class' => 'AppBundle\Entity\Offers'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_offers';
    }
}
